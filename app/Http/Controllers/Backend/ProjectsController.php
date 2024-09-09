<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
    public $_viewPrefix = "backend.frontend_content.projects.";
    public $_viewList = "list_projects";
    public $_viewForm = "manage_projects";
    public $_viewData = [];
    public $_uploadPath;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->_uploadPath = public_path('uploads/projects/');
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Projects";
        $this->_viewData['route'] = route("frontend_projects.create");
        if (request()->ajax()) {
            $query = Project::query()
                ->select('projects.*','project_categories.name as category_name')
                ->leftJoin('project_categories','project_categories.id','=','projects.project_type');
            return DataTables::of($query)
                ->editColumn('action', function (Project $user) {
                    $route = route('frontend_projects.edit', $user->id);
                    $enableDisableBtn = "";
                    if ($user->status == 0) {
                        $enableDisableBtn = Helper::getDeleteIcon("actionProjectstatus(this)", "enable", "Enable");
                    } elseif ($user->status == 1) {
                        $enableDisableBtn = Helper::getDeleteIcon("actionProjectstatus(this)", "disable", "Disable");
                    }
                    return Helper::getIcon($route, 'edit') . " " . $enableDisableBtn . " " . Helper::getDeleteIcon();
                })
                ->editColumn('status', function (Project $user) {
                    $status = $user->status;
                    if ($status == 1) {
                        return Helper::getIcon(null, "enable_status");
                    } elseif ($status == 0) {
                        return Helper::getIcon(null, 'disable_status');
                    }
                })
                ->filterColumn('category_name', function ($query, $keyword) {
                    $sql = 'project_categories.name like ?';
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'searchable' => true, 'name' => 'name', 'title' => 'Name'],
            ['data' => 'description', 'searchable' => true, 'name' => 'description', 'title' => 'Description'],
            ['data' => 'category_name', 'searchable' => true, 'name' => 'category_name', 'title' => 'Category'],
            ['data' => 'status', 'searchable' => true, 'name' => 'status', 'title' => 'Status', 'class' => 'text-center'],
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
            'url' => route("frontend_projects.index"),
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
        $data = new Project();
        $action = route('frontend_projects.store');
        $this->_viewData['page_title'] = 'Add Project';
        $this->_viewData['category_data'] = ProjectCategory::pluck('name', 'id')->toArray();
        if (!empty($id)) {
            $data = Project::findOrFail($id);
            $action = route('frontend_projects.update', $id);
            $this->_viewData['page_title'] = 'Edit Project';
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
        $data = new Project();
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = Project::find($id);
            $action = "Updated Successfully!";
            if ($request->hasFile('photo') && !empty($data->photo)) {
                $this->deleteImage($data->photo);
            }
        }

        $validator = validator($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $values = Arr::except($request->all(), ['_token', '_method', 'photo']);
        foreach ($values as $name => $value) {
            $data->{$name} = $value;
        }
        if ($request->hasFile('photo')) {

            $image = $request->file('photo');
            $name = time() . '_' . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = $this->_uploadPath;
            $image->move($destinationPath, $name);
            $data->photo = $name;
        }
        $data->save();

        return redirect()->route('frontend_projects.index')->with('status', $action);
    }

    public function destroy(Request $request)
    {
        $id = $request->post('id');
        $type = $request->post('type');

        $data = Project::find($id);
        if (isset($type)) {
            if ($type == 'enable') {
                $data->status = 1;
            } else {
                $data->status = 0;
            }
            $data->save();
        } else {
            if (!empty($data->photo)) {
                $this->deleteImage($data->photo);
            }
            $data->delete();
        }

        return response()->json(['status' => !empty($data)]);
    }

    private function deleteImage($imageName)
    {
        $imagePath = $this->_uploadPath . $imageName;

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
