<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;

class ProjectCategoryController extends Controller
{
    public $_viewPrefix = "backend.frontend_content.project_category.";
    public $_viewList = "list_project_category";
    public $_viewForm = "manage_project_category";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Projects Category";
        $this->_viewData['route'] = route("frontend_project_category.create");
        if (request()->ajax()) {
            return DataTables::of(ProjectCategory::query())
                ->editColumn('action', function (ProjectCategory $user) {
                    $route = route('frontend_project_category.edit', $user->id);
                    return Helper::getIcon($route, 'edit')
                    //  . " " . $enableDisableBtn . " " 
                    . Helper::getDeleteIcon();
                })
                ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'searchable' => true, 'name' => 'name', 'title' => 'Name'],
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
            'url' => route("frontend_project_category.index"),
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
        $data = new ProjectCategory();
        $action = route('frontend_project_category.store');
        $this->_viewData['page_title'] = 'Add Project Category';

        if (!empty($id)) {
            $data = ProjectCategory::findOrFail($id);
            $action = route('frontend_project_category.update', $id);
            $this->_viewData['page_title'] = 'Edit Project Category';
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
        $data = new ProjectCategory();
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = ProjectCategory::find($id);
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
        
        $data->name = $request->post('name');
        $name_slug = strtolower($request->post('name'));
        $name_slug = str_replace(' ', '_',$name_slug);
        $data->name_slug = $name_slug;
        $data->save();

        return redirect()->route('frontend_project_category.index')->with('status', $action);
    }

    public function destroy(Request $request)
    {
        $id = $request->post('id');
        $data = ProjectCategory::find($id);
        $delete = $data->delete();
        
        return response()->json(['status' => !empty($delete)]);
    }
}
