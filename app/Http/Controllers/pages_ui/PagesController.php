<?php

namespace App\Http\Controllers\pages_ui;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Helpers\Helper;


class PagesController extends Controller
{
    public $_viewPrefix = "content.pages_ui.";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    // public function index()
    // {
    //     $this->_viewData['page_title'] = "Manage Pages";
    //     $data = Page::get()->toArray();
    //     $this->_viewData['data'] = $data;
    //     return view($this->_viewPrefix . "list_pages", $this->_viewData);
    //     // return view($this->_viewPrefix . "tables-basic", $this->_viewData);
    // }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Pages";
        if (request()->ajax()) {
            return DataTables::of(Page::query())
                // ->editColumn('action', function (FleetManagement $page) {
                //     $route = route('fleet_management.edit', $page->id);
                //     return Helper::getEditSvgIcon($route)
                //         . Helper::getDeleteSvgIcon("javascript:;");
                // })
                // ->filterColumn('rego_expiry', function ($query, $keyword) {
                //     $keyword = trim($keyword);
                //     if (strtotime($keyword) > 0) {
                //         $keyword = date('Y-m-d', strtotime($keyword));
                //     }
                //     $sql = "(rego_expiry) like ?";
                //     $query->whereRaw($sql, ["%{$keyword}%"]);
                // })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                // ->rawColumns(['action'])
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
                'render'         => 'function (data, type, full, meta) {
                    return "<button class=\"btn btn-primary btn-sm\">Edit</button> <button class=\"btn btn-danger btn-sm\">Delete</button>";  
                }'
            ]
        ]);
        $builder->parameters([
            // 'scrollY' => true,
            // 'scrollX' => true,
            'scrollCollapse' => true,
            'buttons'      =>    [
                [
                    'extend' => 'excelHtml5', 'className' => 'btn-success', 'text' => '<i class="fa fa-file-excel">&nbsp;&nbsp;Excel</i>',
                    "exportOptions" => ["columns" => [":not(.noVis)"]]
                ],
                [
                    'extend' => 'pdfHtml5', 'className' => 'btn-danger', 'text' => '<i class="fa fa-file-pdf">&nbsp;&nbsp;Pdf</i>',
                    'pageSize' => 'A4', 'margin' => '[0, 0, 0, 12]', 'orientation' => 'landscape',
                    "exportOptions" => ["columns" => [":not(.noVis)"]]

                ]
            ],
            'drawCallback' => Helper::getDataTablePaginationBtn(),
        ]);
        $builder->ajax([
            'url' => route("pages.index"),
            'type' => 'GET',
            'data' => 'function(d) {}',
        ]);
        $this->_viewData['html'] = $html;
        return view($this->_viewPrefix . "list_pages_ui", $this->_viewData);
        // return view($this->_viewPrefix . "tables-basic", $this->_viewData);
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
        $data = new Page();
        $action = route('pages.store');
        $this->_viewData['page_title'] = 'Add Page';
        if (!empty($id)) {
            $data = Page::findOrFail($id);

            $action = route('pages.update', $id);
            $this->_viewData['page_title'] = 'Edit Page';
        }

        $this->_viewData['data'] = $data->toArray();
        $this->_viewData['action'] = $action;

        return view($this->_viewPrefix . 'manage_pages', $this->_viewData);
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
        $data = new Page();
        $action = "Added Successfully!";
        if (!empty($id)) {
            $data = Page::find($id);
            $action = "Updated Successfully!";
        }

        $validator = validator($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'email|required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'state' => 'required',
            'zipcode' => 'numeric|required',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $values = Arr::except($request->all(), ['_token', '_method']);
        foreach ($values as $name => $value) {
            $data->{$name} = $value;
        }
        if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $name = time() . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('pages');
            $image->move($destinationPath, $name);
            $data->profile_img = $name;
        }
        $data->save();

        return redirect()->route('pages.index')->with('status', $action);
    }

    public function destroy($id)
    {
        $id = request()->post('id');
        Page::find($id)->delete();
        return redirect()->back()->with(['status' => 'Deleted successfully']);
    }
}
