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
                {!! Helper::getLogoImg(120) !!}
                {{-- @include('_partials.macros',['width'=>25,'withbg' => "#696cff"]) --}}
              </span>
              {{-- <span class="app-brand-text demo text-body fw-bolder">{{ config('variables.templateName') }}</span> --}}
            </a>
          </div>
          <!-- /Logo -->
          {!! Helper::getDismissableErrorAlert($errors) !!}
          {!! Helper::getDismissableAlert() !!}
          <h4 class="mb-2">Set new password 🔒</h4>
          <form id="formAuthentication" class="mb-3" action="{{ route('password.update', ['token' => $token, 'email' => request()->get('email')]) }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control password required" id="password" name="password" placeholder="Enter your password" autofocus>
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control password required" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
            </div>
            <button class="btn btn-primary d-grid w-100">Submit</button>
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
   $.validator.addMethod("passwordMatch", function(value, element) {
            var password = $("#password").val();
            var confirmPassword = value;
            return password === confirmPassword;
        }, "Passwords do not match.");

  $("#formAuthentication").validate({
            rules: {
                password: {
                    minlength: 6 // Change the minimum length as needed
                },
                password_confirmation: {
                    minlength: 6, // Change the minimum length as needed
                    passwordMatch: true
                }
            },
            messages: {
                password: {
                    required: "Please enter a password.",
                    minlength: "Password must be at least 6 characters long."
                },
                password_confirmation: {
                    required: "Please confirm your password.",
                    minlength: "Password must be at least 6 characters long.",
                    passwordMatch: "Passwords do not match."
                }
            },
            submitHandler: function(form) {
                // Form submission logic goes here if needed
                form.submit();
            }
        });
    </script>
</script>
@endsection
