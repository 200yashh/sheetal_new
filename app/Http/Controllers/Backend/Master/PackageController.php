<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\MasterPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Helpers\Helper;
use Illuminate\Support\Str;


class PackageController extends Controller
{
    public $_viewPrefix = "backend.master.package.";
    public $_viewList = "list_master_package";
    public $_viewForm = "manage_master_package";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Packages";
        $this->_viewData['route'] = route("master_package.create");
        if (request()->ajax()) {
            return DataTables::of(MasterPackage::query())
                ->editColumn('action', function (MasterPackage $user) {
                    $route = route('master_package.edit', $user->id);
                    return Helper::getIcon($route, 'edit');
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id', 'width' => '10%'],
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
            'scrollCollapse' => true,
            "dom" => '<"row"<"col-md-6"l><"col-md-6 text-md-end"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            'drawCallback' => Helper::getDataTablePaginationBtn(),
        ]);
        $builder->ajax([
            'url' => route("master_package.index"),
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
        $data = new MasterPackage();
        $action = route('master_package.store');
        $this->_viewData['page_title'] = 'Add Package';

        $packages = MasterPackage::pluck('slug')->toJson();
        $this->_viewData['packages'] = $packages;

        if (!empty($id)) {
            $data = MasterPackage::findOrFail($id);
            $action = route('master_package.update', $id);
            $this->_viewData['page_title'] = 'Edit MasterPackage';
        }

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
        $data = new MasterPackage();
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = MasterPackage::find($id);
            $action = "Updated Successfully!";
        }

        $validator = validator($request->all(), [
            'name' => 'required|max:191',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $values = Arr::except($request->all(), ['_token', '_method']);
        foreach ($values as $name => $value) {
            if ($name == "name") {
                $value = ucwords($value);
            }
            if ($name == "slug") {
                $value = Str::slug($value, '_');
            }
            $data->{$name} = $value;
        }
        $data->save();

        return redirect()->route('master_package.index')->with('status', $action);
    }

    public function getSlugOnAjax(){
        $dataToSLugify = request()->post('slug');
        $slug = Str::slug($dataToSLugify, '_');
        return response()->json(['slug' => $slug]);
    }
}
