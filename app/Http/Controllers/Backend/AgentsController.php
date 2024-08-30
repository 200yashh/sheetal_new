<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AgentAddress;
use App\Models\AgentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\AgentRegistrationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class AgentsController extends Controller
{
    public $_viewPrefix = "backend.agents.";
    public $_viewList = "list_agents";
    public $_viewForm = "manage_agents";
    public $_uploadPath;
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->_uploadPath = public_path('uploads/users/');
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Agents";
        $this->_viewData['route'] = route("agents.create");

        $user = auth()->user();

        if (request()->ajax()) {
            $query = User::query()->role('agent');

            if ($user->hasRole('agent')) {
                $query->where('id', $user->id);
            }
            return DataTables::of($query)
                ->editColumn('action', function (User $user) {
                    $route = route('agents.edit', $user->id);
                    $enableDisableBtn = "";
                    if (Helper::isRole('superadmin') && $user->is_active == 0) {
                        $enableDisableBtn = Helper::getDeleteIcon("actionAgentStatus(this)", "enable", "Enable");
                    } elseif (Helper::isRole('superadmin') && $user->is_active == 1) {
                        $enableDisableBtn = Helper::getDeleteIcon("actionAgentStatus(this)", "disable", "Disable");
                    }

                    return Helper::getIcon($route, 'edit', 'Edit') . "&nbsp;&nbsp;&nbsp;" . $enableDisableBtn . " " . Helper::getDeleteIcon();
                })
                ->editColumn('first_name', function (User $user) {
                    return $user->first_name . " " . $user->last_name??"";
                   
                })
                ->editColumn('is_active', function (User $user) {
                    $is_active = $user->is_active;
                    if ($is_active == 1) {
                        return Helper::getIcon(null, "enable_status");
                    } elseif ($is_active == 0) {
                        return Helper::getIcon(null, 'disable_status');
                    }
                })
                ->filterColumn('first_name', function ($query, $keyword) {
                    $sql = "CONCAT(first_name,' ',last_name)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action', 'is_active'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'first_name', 'searchable' => true, 'name' => 'first_name', 'title' => 'Name', 'width' => '30%'],
            ['data' => 'email', 'searchable' => true, 'name' => 'email', 'title' => 'email', 'width' => '30%'],
            ['data' => 'is_active', 'searchable' => true, 'name' => 'is_active', 'title' => 'Status', 'width' => '30%', 'class' => 'text-center'],
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
            'scrollY' => true,
            'scrollX' => true,
            // 'scrollCollapse' => true,
            "dom" => '<"row"<"col-md-6"l><"col-md-6 text-md-end"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            // 'serverSide' =>false,
            'drawCallback' => Helper::getDataTablePaginationBtn(),
        ]);
        $builder->ajax([
            'url' => route("agents.index"),
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
        $data = new User();
        $action = route('agents.store');
        $this->_viewData['page_title'] = 'Add Agent';

        $agents_address = $agents_other_details = [];
        if (!empty($id)) {
            $data = User::findOrFail($id);
            $action = route('agents.update', $id);
            $this->_viewData['page_title'] = 'Edit Agent';
            $agents_address = AgentAddress::where('user_id', $id)->first();
            $agents_other_details = AgentDetail::where('user_id', $id)->first();
        }

        $this->_viewData['data'] = $data;
        $this->_viewData['agents_address'] = $agents_address;
        $this->_viewData['agents_other_details'] = $agents_other_details;
        $this->_viewData['countries_list'] = Helper::getPlaceList('country', 'countryCode');
        $this->_viewData['states_list'] = Helper::getPlaceList('state');
        $this->_viewData['cities_list'] = Helper::getPlaceList('city');
        $this->_viewData['isSuperAdmin'] = Helper::isRole('superadmin');
        $this->_viewData['isAgent'] = Helper::isRole('agent');
        $this->_viewData['action'] = $action;

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
            if ($request->hasFile('profile_img') && !empty($data->profile_img)) {
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

        $data->assignRole('agent');

        $agentsAddress = $request->post('agents_address');
        if (!empty($agentsAddress)) {
            $data2 = AgentAddress::firstOrCreate(['user_id' => $data->id]);
            foreach ($agentsAddress ?? [] as $key => $value) {
                if ($key == 'birth_date') {
                    $value = date('Y-m-d', strtotime($value));
                }
                $data2->{$key} = $value;
            }
            $data2->user_id = $data->id;
            $data2->save();
        }

        $agentsDetails = $request->post('agents_other_details');
        $isCompanyLogo = $request->hasFile('company_logo');
        $isOfficePhoto = $request->hasFile('office_photo');

        if (!empty($agentsDetails) || $isCompanyLogo || $isOfficePhoto) {
            $data3 = AgentDetail::firstOrCreate(['user_id' => $data->id]);
            if ($isCompanyLogo && !empty($data3->company_logo)) {
                $this->deleteImage($data3->company_logo);
            }
            if ($isOfficePhoto && !empty($data3->office_photo)) {
                $this->deleteImage($data3->office_photo);
            }
            foreach ($agentsDetails ?? [] as $key => $value) {
                if ($key == 'passport_issue_date' || $key == 'passport_expiry_date') {
                    $value = date('Y-m-d', strtotime($value));
                }
                $data3->{$key} = $value;
            }
            $data3->user_id = $data->id;
            if ($isCompanyLogo) {
                $image = $request->file('company_logo');
                $name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
                $destinationPath = $this->_uploadPath;
                $image->move($destinationPath, $name);
                $data3->company_logo = $name;
            }
            if ($isOfficePhoto) {
                $image = $request->file('office_photo');
                $name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
                $destinationPath = $this->_uploadPath;
                $image->move($destinationPath, $name);
                $data3->office_photo = $name;
            }
            $data3->save();
        }

        if (empty($id) && Helper::isRole('superadmin')) {
            $mailData = ['name' => $data->first_name, 'email' => $data->email, 'password' => $request->input('password')];
            Helper::sendMail($data->email, 'Agent Registration', 'backend.email.agent_registration', $mailData);
        }

        return redirect()->route('agents.index')->with('status', $action);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        // Validate the ID and find the user or return a 404 response if not found.
        $agent = User::findOrFail($id);

        DB::beginTransaction();

        try {
            if (!empty($agent->profile_img)) {
                $this->deleteImage($agent->profile_img);
            }
            $delete = $agent->forceDelete();

            // Delete address table record
            $address = AgentAddress::where('user_id', $id)->first();
            if (isset($address)) {
                $address->delete();
            }

            // Delete Other Details Table Record
            $otherDetails = AgentDetail::where('user_id', $id)->first();
            if (!empty($otherDetails->company_logo)) {
                $this->deleteImage($otherDetails->company_logo);
            }
            if (!empty($otherDetails->office_photo)) {
                $this->deleteImage($otherDetails->office_photo);
            }
            if (isset($otherDetails)) {
                $otherDetails->delete();
            }

            DB::commit();

            return response()->json(['status' => !empty($delete)]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    private function deleteImage($imageName)
    {
        $imagePath = $this->_uploadPath . $imageName;

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    public function agentAction(Request $request)
    {
        $id = $request->post('id');
        $type = $request->post('type');

        $status = User::find($id);
        if ($type == "disable") {
            $status->update(['is_active' => 0]);
        } elseif ($type == "enable") {
            $status->update(['is_active' => 1]);
        }

        return response()->json(['status' => !empty($status)]);
    }
}
