<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Helpers\Helper;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public $_viewPrefix = "backend.master.role.";
    public $_viewList = "list_master_role";
    public $_viewForm = "manage_master_role";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Roles";
        $this->_viewData['route'] = route("master_role.create");
        if (request()->ajax()) {
            return DataTables::of(Role::query())
                ->editColumn('name', function (Role $user) {
                    $name = (isset($user->name)) ? ucwords($user->name) : "";
                    return $name;
                })
                ->editColumn('action', function (Role $user) {
                    $route = route('master_role.edit', $user->id);
                    return Helper::getIcon($route, 'edit');
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'searchable' => true, 'name' => 'id', 'title' => 'Id', 'width' => '10%'],
            ['data' => 'name', 'searchable' => true, 'name' => 'name', 'title' => 'Name', 'width' => '90%'],
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
                'class' => 'text-center noVis',
            ]
        ]);
        $builder->parameters([
            'scrollY' => true,
            'scrollX' => true,
            // 'scrollCollapse' => true,
            "dom" => '<"row"<"col-md-6"l><"col-md-6 text-md-end"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            'drawCallback' => Helper::getDataTablePaginationBtn(),
        ]);
        $builder->ajax([
            'url' => route("master_role.index"),
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
        $action = route('master_role.store');
        $this->_viewData['page_title'] = 'Add Role';
        if (!empty($id)) {
            $data = Role::findOrFail($id);
            $action = route('master_role.update', $id);
            $this->_viewData['page_title'] = 'Edit Role';
        }

        $this->_viewData['data'] = $data->toArray();
        $this->_viewData['action'] = $action;

        if (isset($this->_viewData['data']['name'])) {
            $this->_viewData['data']['orgName'] = ($this->_viewData['data']['name']);
            $this->_viewData['data']['name'] = ucwords($this->_viewData['data']['name']);
        }

        $this->_viewData['allMenus'] = Helper::getAllMenus();
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
        $validator = validator($request->all(), [
            'name' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new Role();
        $roleName = strtolower($request->post('name'));
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = Role::find($id);
            $action = "Updated Successfully!";
        } else {
            $count = Role::where(['name' => $roleName])->count();
            if ($count > 0) {
                return redirect()->back()->with('status', 'Role is already exist!');
            }
            $data = Role::create(['name' => $roleName]);
        }

        // Remove all permissions for this role
        $data->syncPermissions([]);

        // Assign Permission
        $permissions = $request->post('permission', []);

        if (!empty($permissions['admin'])) {
            foreach ($permissions['admin'] as $module => $modulePermissions) {
                foreach ($modulePermissions as $name => $val) {
                    $pName = 'admin.' . $module . '.' . $name;
                    $p = Permission::firstOrCreate(['name' => $pName]);
                    $data->givePermissionTo($p);
                }
            }
        }

        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $data->bootRefreshesPermissionCache();

        return redirect()->route('master_role.index')->with('status', $action);
    }
}
