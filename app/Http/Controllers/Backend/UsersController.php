<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public $_viewPrefix = "backend.users.";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Users";
        $this->_viewData['route'] = route("users.create");
        if (request()->ajax()) {
            $query = User::query()->whereNot('role_id', 1);
            return DataTables::of($query)
                ->editColumn('action', function (User $user) {
                    $route = route('users.edit', $user->id);

                    if ($user->is_active == 0) {
                        return Helper::getDeleteIcon("actionEnable(this)", "enable", "Enable") . " " . Helper::getIcon($route, 'edit', 'Edit') . " " . Helper::getDeleteIcon();
                    } else {
                        return Helper::getDeleteIcon("actionDisable(this)", "disable", "Disable") . " " . Helper::getIcon($route, 'edit', 'Edit') . " " . Helper::getDeleteIcon();
                    }
                })
                ->editColumn('is_active', function (User $user) {
                    $is_active = $user->is_active;
                    if ($is_active == 1) {
                        return Helper::getIcon(null, "enable_status");
                    } elseif ($is_active == 0) {
                        return Helper::getIcon(null, 'disable_status');
                    }
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action', 'is_active'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id', 'class' => 'min-w-125px'],
            ['data' => 'first_name', 'searchable' => true, 'name' => 'first_name', 'title' => 'first_name', 'class' => 'min-w-125px'],
            ['data' => 'last_name', 'searchable' => true, 'name' => 'last_name', 'title' => 'last_name', 'class' => 'min-w-125px'],
            ['data' => 'email', 'searchable' => true, 'name' => 'email', 'title' => 'email', 'class' => 'min-w-125px'],
            ['data' => 'address', 'searchable' => true, 'name' => 'address', 'title' => 'address', 'class' => 'min-w-125px'],
            ['data' => 'is_active', 'searchable' => true, 'name' => 'is_active', 'title' => 'Status', 'class' => 'min-w-125px text-center'],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'footer'         => '',
                'class' => 'min-w-125px text-center noVis',
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
            'url' => route("users.index"),
            'type' => 'GET',
            'data' => 'function(d) {}',
        ]);
        $this->_viewData['html'] = $html;
        return view($this->_viewPrefix . "list_users", $this->_viewData);
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
        $data = new User();
        $action = route('users.store');
        $this->_viewData['page_title'] = 'Add User';

        $roles = Helper::getRoles();

        if (!empty($id)) {
            $data = User::findOrFail($id);

            $action = route('users.update', $id);
            $this->_viewData['page_title'] = 'Edit User';
        }

        $this->_viewData['data'] = $data;
        $this->_viewData['roles'] = $roles;
        $this->_viewData['action'] = $action;

        return view($this->_viewPrefix . 'manage_users', $this->_viewData);
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
            $oldProfileImg = $data->profile_img ?? "";
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
            'last_name' => 'required|max:255',
            'email' => 'email|required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'state' => 'required',
            'zipcode' => 'numeric|required',
            'country' => 'required',
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

        $values = Arr::except($request->all(), ['_token', '_method', 'password_confirmation']);
        if(!empty($id) && empty($values['password'])){
            unset($values['password']);
        }

        foreach ($values as $name => $value) {
            if ($name == 'password') {
                $value = Hash::make($value);
            }
            $data->{$name} = $value;
        }

        if ($request->hasFile('profile_img')) {
            if (!empty($id) && isset($oldProfileImg)) {
                if (File::exists(public_path('users/' . $oldProfileImg))) {
                    File::delete(public_path('users/' . $oldProfileImg));
                }
            }

            $image = $request->file('profile_img');
            $name = time() . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('users');
            $image->move($destinationPath, $name);
            $data->profile_img = $name;
        }
        $data->role_id = 3;
        $data->save();
        return redirect()->route('users.index')->with('status', $action);
    }

    public function userAction($id)
    {
        $id = request()->post('id');
        $type = request()->post('type');

        $status = User::find($id);
        if ($type == "disable") {
            $status->update(['is_active' => 0]);
        } elseif ($type == "enable") {
            $status->update(['is_active' => 1]);
        } elseif ($type == "restore") {
            $status = User::onlyTrashed()->find($id)->restore();
        }
        return response()->json(['status' => !empty($status)]);
    }

    public function deletedUsers(Builder $builder)
    {
        $this->_viewData['page_title'] = "Deleted Users";
        if (request()->ajax()) {
            $query = User::query()->onlyTrashed();
            return DataTables::of($query)
                ->editColumn('action', function (User $user) {
                    return Helper::getDeleteIcon("actionRestore(this)", "restore", "Restore User") . " " . Helper::getDeleteIcon("actionForceDelete(this)", null, "Delete Permanently");
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action', 'is_active'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id', 'class' => 'min-w-125px'],
            ['data' => 'first_name', 'searchable' => true, 'name' => 'first_name', 'title' => 'first_name', 'class' => 'min-w-125px'],
            ['data' => 'last_name', 'searchable' => true, 'name' => 'last_name', 'title' => 'last_name', 'class' => 'min-w-125px'],
            ['data' => 'email', 'searchable' => true, 'name' => 'email', 'title' => 'email', 'class' => 'min-w-125px'],
            ['data' => 'address', 'searchable' => true, 'name' => 'address', 'title' => 'address', 'class' => 'min-w-125px'],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => 'Action',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'footer'         => '',
                'class' => 'min-w-125px text-center noVis',
            ]
        ]);
        $builder->parameters([
            // 'scrollY' => true,
            // 'scrollX' => true,
            // 'scrollCollapse' => true,
            "dom" => '<"row"<"col-md-6"l><"col-md-6 text-md-end"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            // 'serverSide' =>false,
            // 'drawCallback' => Helper::getDataTableRowClass("KTDatatablesButtons.init();")
        ]);
        $builder->ajax([
            'url' => route("users.deleted"),
            'type' => 'GET',
            'data' => 'function(d) {}',
        ]);
        $this->_viewData['html'] = $html;
        return view($this->_viewPrefix . "list_users", $this->_viewData);
    }

    public function destroy($id)
    {
        $id = request()->post('id');
        $type = request()->post('type');

        if ($type == "soft") {
            $delete = User::find($id)->delete();
        } elseif ($type == "hard") {
            $delete = User::onlyTrashed()->find($id)->forceDelete();
        }
        return response()->json(['status' => !empty($delete)]);
    }
}
