<?php

namespace App\Http\Controllers\Logs;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class SystemLogsController extends Controller
{
    public $_viewPrefix = "system.logs.";
    public $_viewList = "list_logs";
    public $_viewData = [];
    public $_logViewer;

    public function __construct(LaravelLogViewer $logViewer)
    {
        $this->_logViewer = $logViewer;
    }

    public function index(Builder $builder)
    {
        // dd($this->_logViewer->all());
        $this->_viewData['page_title'] = "System Logs";
        if (request()->ajax()) {
            return DataTables::of($this->_logViewer->all())
                // ->setRowClass('text-center')
                // ->setRowId('{{$id}}')
                ->rawColumns(['action', 'status'])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'level', 'name' => 'level', 'title' => 'Level'],
            ['data' => 'context', 'searchable' => true, 'name' => 'context', 'title' => 'Context'],
            ['data' => 'date', 'searchable' => true, 'name' => 'date', 'title' => 'date'],
            ['data' => 'text', 'searchable' => true, 'name' => 'text', 'title' => 'Text', 'class' => 'text-center'],
            ['data' => 'in_file', 'searchable' => true, 'name' => 'in_file', 'title' => 'In File', 'class' => 'text-center'],
        ]);
        $builder->parameters([
            'scrollY' => true,
            'scrollX' => true,
            'scrollCollapse' => true,
            'serverSide' => false,
            "dom" => '<"row"<"col-md-6"l><"col-md-6 text-md-end"f>>t<"row"<"col-md-6"i><"col-md-6"p>>',
            'drawCallback' => Helper::getDataTablePaginationBtn(),
        ]);
        $builder->ajax([
            'url' => route("system_logs.index"),
            'type' => 'GET',
            'data' => 'function(d) {}',
        ]);
        $this->_viewData['html'] = $html;
        return view($this->_viewPrefix . $this->_viewList, $this->_viewData);
    }
}
