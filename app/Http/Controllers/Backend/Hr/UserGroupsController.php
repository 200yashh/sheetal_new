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

        $allMenus = [];

        foreach ($verticalMenuData['menu'] as $item) {
            if (isset($item['submenu'])) {
                $submenu = collect($item['submenu'])->pluck('name', 'slug')->toArray();
                $allMenus = array_merge($allMenus, $submenu);
            } else {
                $allMenus[$item['slug']] = $item['name'];
            }
        }

        array_shift($allMenus);

        $this->_viewData['allMenus'] = $allMenus;
        $this->_viewData['user'] = auth()->user();

        return view($this->_viewPrefix . $this->_viewForm, $this->_viewData);
    }

    public function edit($id)
    {
        return $this->show($id);
    }
}
