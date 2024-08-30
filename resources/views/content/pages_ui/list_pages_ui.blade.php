@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

    <div class="row">
        <h4 class="fw-bold py-3">
            <span class="text-muted fw-light">{{ $page_title }}</span>
        </h4>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn rounded btn-outline-primary text-dark col-md-2 my-3">
                <a href="{{ route('users.create') }}">Add User</a>
            </button>
        </div>
        @if (session('status'))
            <div class="alert alert-primary" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <!--begin: Datatable-->
        {!! $html->table() !!}
        <!--end: Datatable-->

        {!! $html->scripts() !!}
    </div>

@endsection
