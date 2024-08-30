{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}
@extends('layouts/blankLayout')

@section('title', __('Service Unavailable'))
@section('code', '503')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection

@section('content')
<!--Under Maintenance -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Under Maintenance!</h2>
    <p class="mb-4 mx-2">
      Sorry for the inconvenience but we're performing some maintenance at the moment
    </p>
    {{-- <a href="{{url('/')}}" class="btn btn-primary">Back to home</a> --}}
    <div class="mt-4">
      <img src="{{asset('assets/img/illustrations/girl-doing-yoga-light.png')}}" alt="girl-doing-yoga-light" width="500" class="img-fluid">
    </div>
  </div>
</div>
<!-- /Under Maintenance -->
@endsection


