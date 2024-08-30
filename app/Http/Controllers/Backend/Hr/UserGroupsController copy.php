<?php

namespace App\Http\Controllers\Backend\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserGroupsController extends Controller
{
    public $_viewPrefix = "backend.hr.";
    public $_viewList = "list_user-groups";
    public $_viewForm = "manage_user-groups";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "HR - User Groups";
        $this->_viewData['route'] = route("user-groups.create");
        if (request()->ajax()) {
            $all_roles_in_database = Role::query();
            if (!auth()->user()->hasRole(['superadmin'])) {
                $all_roles_in_database->where('name', '!=', 'superadmin');
            }
            return DataTables::of($all_roles_in_database)
                ->editColumn('name', function (Role $user) {
                    return ucwords($user->name);
                })
                ->editColumn('action', function (Role $user) {
                    $route = route('user-groups.edit', $user->id);
                    return Helper::getEditSvgIcon($route);
                })
                ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['type', 'action'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'name', 'name' => 'name', 'title' => 'User Group', 'class' => 'min-w-125px'],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '', 'class' => 'min-w-125px'
            ]
        ]);
        $builder->parameters([
            // 'scrollY' => true,
            // 'scrollX' => true,
            // 'scrollCollapse' => true,
            "dom" => '<"row"<"col-md-6"l><"col-md-6 text-md-end"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            // 'serverSide' =>false,
            'drawCallback' => Helper::getDataTablePaginationBtn(),
        ]);
        $builder->ajax([
            'url' => route("user-groups.index"),
            'type' => 'GET',
            'data' => 'function(d) {}',
        ]);
        $this->_viewData['html'] = $html;
        return view($this->_viewPrefix . $this->_viewList, $this->_viewData);
    }

    public function create()
    {
        return $this->show(null);
    }

    public function store(Request $request)
    {
        return $this->save($request, null);
    }

    public function show($id)
    {
        $data = new Role();
        $action = route('user-groups.store');
        $this->_viewData['page_title'] = 'Add User Group';
        if (!empty($id)) {
            $data = Role::findOrFail($id);
            $action = route('user-groups.update', $id);
            $this->_viewData['page_title'] = 'Edit User Group';
        }
        $this->_viewData['data'] = $data->toArray();
        if (isset($this->_viewData['data']['name'])) {
            $this->_viewData['data']['orgName'] = ($this->_viewData['data']['name']);
            $this->_viewData['data']['name'] = ucwords($this->_viewData['data']['name']);
        }
        $this->_viewData['action'] = $action;

        $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson, true);

        // dd($verticalMenuData);

        $allMenus = [];
        $this->flattenMenu($verticalMenuData['menu']);
        array_shift($allMenus);
        
        // $this->_viewData['allMenus'] = $allMenus;

        $this->_viewData['permissionData'] = $data->getAllPermissions()->pluck('name')->toArray();

        return view($this->_viewPrefix . $this->_viewForm, $this->_viewData);
    }

    public function edit($id)
    {
        return $this->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function save($request, $id)
    {
        $data = new User();
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = User::find($id);
            $action = "Updated Successfully!";
            if (!empty($data->profile_img)) {
                $this->deleteImage($data->profile_img);
            }
        }

        $messages = [
            'unique' => 'The :attribute is already registered with us.',
        ];
        $emailValidation = [
            'required',
            'email'
        ];

        if (!empty($id)) {
            $emailValidation[] = Rule::unique('users')->ignore($data->id);
        } else {
            $emailValidation[] = Rule::unique('users');
        }

        $rules = [
            'first_name' => 'required|max:255',
            // 'last_name' => 'required|max:255',
            'email' => $emailValidation,
            'phone' => 'numeric|required',
            'birth_date' => 'date|required',
        ];

        if (!empty($id) && !empty($request->post('password'))) {
            $rules['password'] = 'min:6|confirmed';
        }
        if (empty($id)) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        $validator = validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $values = Arr::except($request->all(), ['_token', '_method', 'password_confirmation', 'agents_address', 'agents_other_details', 'company_logo', 'office_photo']);
        if (!empty($id) && empty($values['password'])) {
            unset($values['password']);
        }

        foreach ($values as $name => $value) {
            if ($name == 'password') {
                $value = Hash::make($value);
            }
            $data->{$name} = $value;
        }

        if ($request->hasFile('profile_img')) {

            $image = $request->file('profile_img');
            $name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $this->_uploadPath;
            $image->move($destinationPath, $name);
            $data->profile_img = $name;
        }
        $data->role_id = 3;
        $data->save();

        $agentsAddress = $request->post('agents_address');
        $data2 = new AgentAddress();
        if (!empty($id)) {
            $data2 = AgentAddress::where('user_id', $id)->first();
        }
        foreach ($agentsAddress as $key => $value) {
            if ($key == 'birth_date') {
                $value = date('Y-m-d', strtotime($value));
            }
            $data2->{$key} = $value;
        }
        $data2->user_id = $data->id;
        $data2->save();

        $agentsDetails = $request->post('agents_other_details');
        $data3 = new AgentDetail();
        if (!empty($id)) {
            $data3 = AgentDetail::where('user_id', $id)->first();
            if (!empty($data3->company_logo)) {
                $this->deleteImage($data3->company_logo);
            }
            if (!empty($data3->office_photo)) {
                $this->deleteImage($data3->office_photo);
            }
        }
        foreach ($agentsDetails as $key => $value) {
            if ($key == 'passport_issue_date' || $key == 'passport_expiry_date') {
                $value = date('Y-m-d', strtotime($value));
            }
            $data3->{$key} = $value;
        }
        $data3->user_id = $data->id;
        if ($request->hasFile('company_logo')) {

            $image = $request->file('company_logo');
            $name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $this->_uploadPath;
            $image->move($destinationPath, $name);
            $data3->company_logo = $name;
        }
        if ($request->hasFile('office_photo')) {

            $image = $request->file('office_photo');
            $name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $this->_uploadPath;
            $image->move($destinationPath, $name);
            $data3->office_photo = $name;
        }
        $data3->save();

        return redirect()->route('agents.index')->with('status', $action);
    }

    public function destroy($id)
    {
        $id = request()->post('id');

        $agent = User::find($id);
        if (!empty($agent->profile_img)) {
            $this->deleteImage($agent->profile_img);
        }
        $delete = $agent->delete();

        // Delete address table record
        AgentAddress::where('user_id', $id)->delete();

        // Delete Other Details Table Record
        $otherDetails = AgentDetail::where('user_id', $id)->first();
        if (!empty($otherDetails->company_logo)) {
            $this->deleteImage($otherDetails->company_logo);
        }
        if (!empty($otherDetails->office_photo)) {
            $this->deleteImage($otherDetails->office_photo);
        }
        $otherDetails->delete();

        return response()->json(['status' => !empty($delete)]);
    }

    public function flattenMenu($menu)
    {
        // foreach ($menu as $item) {
        //     $allMenus[$item['slug']] = $item['name'];

        //     if (isset($item['submenu'])) {
        //         $this->flattenMenu($item['submenu'], $allMenus);
        //     }
        // }

        foreach ($menu as $item) {
            if (isset($item['submenu'])) {
                $this->flattenMenu($item['submenu']);
            } else {
                $slug[$item['name']] = $item['slug'];
            }
        }
    }
}
