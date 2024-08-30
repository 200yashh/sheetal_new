<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{
    public $_viewPrefix = "backend.frontend_content.testimonials.";
    public $_viewList = "list_testimonials";
    public $_viewForm = "manage_testimonials";
    public $_viewData = [];
    public $_uploadPath;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->_uploadPath = public_path('uploads/testimonials/');
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Testimonials";
        $this->_viewData['route'] = route("frontend_testimonials.create");
        if (request()->ajax()) {
            return DataTables::of(Testimonial::query())
                ->editColumn('action', function (Testimonial $user) {
                    $route = route('frontend_testimonials.edit', $user->id);
                    $enableDisableBtn = "";
                    if ($user->status == 0) {
                        $enableDisableBtn = Helper::getDeleteIcon("actionTestimonialStatus(this)", "enable", "Enable");
                    } elseif ($user->status == 1) {
                        $enableDisableBtn = Helper::getDeleteIcon("actionTestimonialStatus(this)", "disable", "Disable");
                    }
                    return Helper::getIcon($route, 'edit') . " " . $enableDisableBtn . " " . Helper::getDeleteIcon();
                })
                ->editColumn('status', function (Testimonial $user) {
                    $status = $user->status;
                    if ($status == 1) {
                        return Helper::getIcon(null, "enable_status");
                    } elseif ($status == 0) {
                        return Helper::getIcon(null, 'disable_status');
                    }
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'description', 'searchable' => true, 'name' => 'description', 'title' => 'Description'],
            ['data' => 'name', 'searchable' => true, 'name' => 'name', 'title' => 'Name'],
            ['data' => 'sequence', 'searchable' => true, 'name' => 'sequence', 'title' => 'Sequence'],
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
            'url' => route("frontend_testimonials.index"),
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
        $data = new Testimonial();
        $action = route('frontend_testimonials.store');
        $this->_viewData['page_title'] = 'Add Testimonial';

        if (!empty($id)) {
            $data = Testimonial::findOrFail($id);
            $action = route('frontend_testimonials.update', $id);
            $this->_viewData['page_title'] = 'Edit Testimonial';
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
        $data = new Testimonial();
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = Testimonial::find($id);
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

        return redirect()->route('frontend_testimonials.index')->with('status', $action);
    }

    public function destroy(Request $request)
    {
        $id = $request->post('id');
        $type = $request->post('type');

        $data = Testimonial::find($id);
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
