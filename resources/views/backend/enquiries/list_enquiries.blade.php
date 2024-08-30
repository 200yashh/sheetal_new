@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('content')

<div class="row">
    <div class="col-md mb-4 mb-md-0">
        <div class="card">
            <h5 class="card-header">{{ $page_title }}</h5>
            <div class="card-body">

                {!! Helper::getDismissableAlert('primary') !!}
                <!--begin: Datatable-->
                {!! $html->table(['class' => 'table table-bordered w-100 table-hover']) !!}
                <!--end: Datatable-->
            </div>
        </div>
    </div>
</div>

{!! $html->scripts() !!}

@endsection