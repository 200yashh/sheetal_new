@extends('layouts/blankLayout')

@section('title', 'Forgot Password Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('admin/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                {{-- @include('_partials.macros',['width'=>25,'withbg' => "#696cff"]) --}}
                {!! Helper::getLogoImg(120) !!}
              </span>
              {{-- <span class="app-brand-text demo text-body fw-bolder">{{ config('variables.templateName') }}</span> --}}
            </a>
          </div>
          <!-- /Logo -->
          {!! Helper::getDismissableErrorAlert($errors) !!}
          {!! Helper::getDismissableAlert() !!}
          <h4 class="mb-2">Forgot Password? 🔒</h4>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
          <form id="formAuthentication" class="mb-3" action="{{ route('password.request') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control email required" id="email" name="email" placeholder="Enter your email" autofocus>
            </div>
            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
          </form>
          <div class="text-center">
            <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
<script>
  $('#formAuthentication').validate();
</script>
@endsection
