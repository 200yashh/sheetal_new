<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AgentPackage;
use App\Models\MasterPackage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Builder;

class AgentsPackagesController extends Controller
{
    public $_routePrefix = "agents_packages.";
    public $_viewPrefix = "backend.agents.agents_packages.";
    public $_viewList = "list_agents_packages";
    public $_viewForm = "manage_agents_packages";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Packages";
        $this->_viewData['route'] = route($this->_routePrefix . "create");
        $this->_viewData['master_packages_list'] = $this->getMasterPackages();
        $this->_viewData['agents_list'] = $this->getAgentsList();

        $user = auth()->user();

        if (request()->ajax()) {
            $query = AgentPackage::query()
                ->select('agent_packages.*', DB::raw('CONCAT(COALESCE(users.first_name, ""), " ", COALESCE(users.last_name, "")) AS agent_name'), 'master_packages.name AS category')
                ->join('users', 'agent_packages.agent_id', 'users.id')
                ->leftJoin('master_packages', 'agent_packages.master_package_id', 'master_packages.id');

            if (Helper::isRole('agent')) {
                $query->where('agent_packages.agent_id', $user->id);
            }
            return DataTables::of($query)
                ->filter(function ($query) {
                    if (request()->has('agent_id')) {
                        $query->where('agent_packages.agent_id', 'like', "%" . request('agent_id') . "%");
                    }
                    if (request()->has('master_package_id')) {
                        $query->where('agent_packages.master_package_id', 'like', "%" . request('master_package_id') . "%");
                    }
                }, true)
                ->editColumn('start_date', function (AgentPackage $user) {
                    return date('d-m-Y', strtotime($user->start_date));
                })
                ->editColumn('end_date', function (AgentPackage $user) {
                    return date('d-m-Y', strtotime($user->end_date));
                })
                ->editColumn('status', function (AgentPackage $user) {
                    $status = $user->status;
                    if ($status == 1) {
                        return Helper::getIcon(null, "enable_status");
                    } elseif ($status == 0) {
                        return Helper::getIcon(null, 'disable_status');
                    }
                })
                ->editColumn('action', function (AgentPackage $user) {
                    $route = route('agents_packages.edit', $user->id);
                    return Helper::getIcon($route, 'edit') . " " . Helper::getDeleteIcon();
                })
                ->filterColumn('agent_packages.master_package_id', function ($query, $keyword) {
                    $sql = "(master_packages.name) like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('agent_name', function ($query, $keyword) {
                    $sql = "CONCAT(users.first_name,' ',users.last_name)  like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('start_date', function ($query, $keyword) {
                    $keyword = date('Y-m-d', strtotime($keyword));
                    $sql = "agent_packages.start_date like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('end_date', function ($query, $keyword) {
                    $keyword = date('Y-m-d', strtotime($keyword));
                    $sql = "agent_packages.end_date like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['status', 'action'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'searchable' => true, 'name' => 'id', 'title' => 'Id', 'width' => '10%'],
            ['data' => 'agent_name', 'searchable' => true, 'name' => 'agent_name', 'title' => 'Agents', 'width' => '15%'],
            ['data' => 'start_date', 'searchable' => true, 'name' => 'start_date', 'title' => 'Start Date', 'width' => '15%'],
            ['data' => 'end_date', 'searchable' => true, 'name' => 'end_date', 'title' => 'End Date', 'width' => '15%'],
            ['data' => 'days', 'searchable' => true, 'name' => 'days', 'title' => 'Days', 'width' => '15%'],
            ['data' => 'category', 'searchable' => true, 'name' => 'agent_packages.master_package_id', 'title' => 'Category', 'width' => '15%'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status', 'width' => '15%', 'class' => 'text-center'],
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
            'url' => route($this->_routePrefix . "index"),
            'type' => 'GET',
            'data' => 'function(d) {
                d.agent_id = $(".agent_id").val();
                d.master_package_id = $(".master_package_id").val();
            }',
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
        $data = new AgentPackage();
        $action = route($this->_routePrefix . 'store');
        $this->_viewData['page_title'] = 'Add Agent Package';
        if (!empty($id)) {
            $data = AgentPackage::findOrFail($id);
            $action = route($this->_routePrefix . 'update', $id);
            $this->_viewData['page_title'] = 'Edit Agent Package';
        }

        $this->_viewData['master_packages_list'] = $this->getMasterPackages();
        $this->_viewData['agents_list'] = $this->getAgentsList();
        $this->_viewData['data'] = $data->toArray();
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
        $validator = validator($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'end_date' => 'required',
            'availability' => 'required',
            'flight' => 'required',
            'rate' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new AgentPackage();
        $action = "Added Successfully!";

        $agent_id = $request->post('agent_id') ?? auth()->user()->id;
        if (!empty($id)) {
            $data = AgentPackage::find($id);
            $action = "Updated Successfully!";

            $agent_id = $data->agent_id;
        }

        $existedId = AgentPackage::where('agent_id', $agent_id)
            ->where('master_package_id', $request->post('master_package_id'))
            ->first()->id ?? null;

        if (isset($existedId) && $existedId != $data->id) { //Checking if existed Package Id is not equal to current package id
            $package_name = MasterPackage::find($request->post('master_package_id'))->name;
            return redirect()->back()->withErrors('You already have ' . $package_name . ' Package');
        }

        $values = Arr::except($request->all(), ['_token', '_method']);

        foreach ($values as $name => $value) {
            if ($name == 'start_date' || $name == 'end_date') {
                $value = Carbon::parse($value)->tz(config('app.timezone'))->format('Y-m-d');
            }

            $data->{$name} = $value;
        }

        if (Helper::isRole('agent')) {
            $data->agent_id = auth()->user()->id;
        }

        $data->save();

        return redirect()->route($this->_routePrefix . 'index')->with('status', $action);
    }

    public function destroy($id)
    {
        $delete = AgentPackage::find($id)->delete();
        return response()->json(['status' => !empty($delete)]);
    }

    public function getMasterPackages()
    {
        return MasterPackage::pluck('name', 'id')->toArray();
    }

    public function getAgentsList()
    {
        return User::role('agent')
            ->select(DB::raw('CONCAT(COALESCE(first_name, ""), " ", COALESCE(last_name, "")) AS agent_name'), 'id')
            ->pluck('agent_name', 'id')
            ->toArray();
    }
}
