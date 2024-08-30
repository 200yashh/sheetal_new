<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\MasterEnquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use DataTables;

class EnquiryController extends Controller
{
    public $_viewPrefix = "backend.enquiries.";
    public $_viewList = "list_enquiries";
    public $_viewData = [];
    public $_agentFullName = 'CONCAT(users.first_name, " ", COALESCE(users.last_name, ""))';

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function index(Builder $builder)
    {
        $this->_viewData['page_title'] = "Manage Enquiries";
        $this->_viewData['route'] = route("enquiries.create");

        $user = auth()->user();

        if (request()->ajax()) {
            $query = Enquiry::query()
                ->select(
                    'enquiries.*',
                    'master_enquiries.id AS master_enquiry_id',
                    'master_enquiries.agent_package_id AS agent_package_id',
                    'master_enquiries.master_package_id AS master_package_id',
                    'master_packages.name AS master_package_name',
                    \DB::raw($this->_agentFullName . 'AS agent')
                )
                ->join('master_enquiries', 'master_enquiries.id', 'enquiries.master_enquiry_id')
                ->join('users', 'users.id', 'master_enquiries.agent_id')
                ->leftJoin('master_packages', 'master_packages.id', 'master_enquiries.master_package_id');

            if ($user->hasRole('agent')) {
                $query->where('master_enquiries.agent_id', $user->id);
            }
            return DataTables::of($query)
                ->editColumn('created_at', function (Enquiry $user) {
                    return date('d-m-Y', strtotime($user->created_at));
                })
                ->editColumn('passport_date_of_issue', function (Enquiry $user) {
                    if (!empty($user->passport_date_of_issue)) {
                        return date('d-m-Y', strtotime($user->passport_date_of_issue));
                    }
                })
                ->editColumn('passport_date_of_expiry', function (Enquiry $user) {
                    if (!empty($user->passport_date_of_expiry)) {
                        return date('d-m-Y', strtotime($user->passport_date_of_expiry));
                    }
                })
                ->editColumn('dob', function (Enquiry $user) {
                    if (!empty($user->dob)) {
                        return date('d-m-Y', strtotime($user->dob));
                    }
                })
                ->filterColumn('users.first_name', function ($query, $keyword) {
                    $sql = $this->_agentFullName . " like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('master_enquiries.created_at', function ($query, $keyword) {
                    $keyword = date('Y-m-d', strtotime(trim($keyword)));
                    $sql = "master_enquiries.created_at like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('passport_date_of_issue', function ($query, $keyword) {
                    $keyword = date('Y-m-d', strtotime(trim($keyword)));
                    $sql = "passport_date_of_issue like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('passport_date_of_expiry', function ($query, $keyword) {
                    $keyword = date('Y-m-d', strtotime(trim($keyword)));
                    $sql = "passport_date_of_expiry like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                ->filterColumn('dob', function ($query, $keyword) {
                    $keyword = date('Y-m-d', strtotime(trim($keyword)));
                    $sql = "dob like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                // ->setRowClass('text-center')
                ->setRowId('{{$id}}')
                ->rawColumns([])
                ->toJson();
        }

        $html = $builder->columns([
            ['data' => 'master_enquiry_id', 'name' => 'master_enquiries.id', 'title' => 'Master Enquiry ID'],
            ['data' => 'id', 'name' => 'id', 'title' => 'Enquiry ID'],
            ['data' => 'agent', 'searchable' => true, 'name' => 'users.first_name', 'title' => 'Agent',],
            ['data' => 'agent_package_id', 'searchable' => true, 'name' => 'master_enquiries.agent_package_id', 'title' => 'Agent Package ID'],
            ['data' => 'master_package_name', 'searchable' => true, 'name' => 'master_packages.name', 'title' => 'Package Category'],
            ['data' => 'name_as_per_passport', 'searchable' => true, 'name' => 'name_as_per_passport', 'title' => 'Name as per Passport'],
            ['data' => 'passport_number', 'searchable' => true, 'name' => 'passport_number', 'title' => 'Passport Number'],
            ['data' => 'passport_number', 'searchable' => true, 'name' => 'passport_number', 'title' => 'Passport Number'],
            ['data' => 'passport_date_of_issue', 'searchable' => true, 'name' => 'passport_date_of_issue', 'title' => 'Passport Date of Issue'],
            ['data' => 'passport_date_of_expiry', 'searchable' => true, 'name' => 'passport_date_of_expiry', 'title' => 'Passport Date of Expiry'],
            ['data' => 'nationality', 'searchable' => true, 'name' => 'nationality', 'title' => 'Nationality'],
            ['data' => 'dob', 'searchable' => true, 'name' => 'dob', 'title' => 'Date of Birth'],
            ['data' => 'place_of_birth', 'searchable' => true, 'name' => 'place_of_birth', 'title' => 'Place of Birth'],
            ['data' => 'gender', 'searchable' => true, 'name' => 'gender', 'title' => 'Gender'],
            ['data' => 'address', 'searchable' => true, 'name' => 'address', 'title' => 'Address'],
            ['data' => 'contact', 'searchable' => true, 'name' => 'contact', 'title' => 'Contact Number'],
            ['data' => 'email', 'searchable' => true, 'name' => 'email', 'title' => 'Email'],
            ['data' => 'created_at', 'searchable' => true, 'name' => 'master_enquiries.created_at', 'title' => 'Enquiry Date'],
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
            'url' => route("enquiries.index"),
            'type' => 'GET',
            'data' => 'function(d) {}',
        ]);
        $this->_viewData['html'] = $html;
        return view($this->_viewPrefix . $this->_viewList, $this->_viewData);
    }
}
