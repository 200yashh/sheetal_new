@php
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('content')
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/wizard/css/bd-wizard.css') }}">

    {!! Helper::getDismissableErrorAlert($errors) !!}
    <form id="manage_form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @if (!empty($data['id']))
            @method('PUT')
        @endif
        @csrf
        <div id="wizard">
            @include('backend/agents/wizard/step_1')
            @include('backend/agents/wizard/step_2')
            @include('backend/agents/wizard/step_3')
            @include('backend/agents/wizard/step_4')
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/wizard/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/wizard/js/bd-wizard.js') }}"></script>
    <script>
        // Form submission
        $(document).ready(function(){
            $('a[href="#finish"]').click(function(){
                $('#manage_form').submit();
            })
        })
        // Initiating datepicker of flatpickr
        $('.flatpickr').flatpickr();
    </script>
    <script>
        $.validator.addMethod("passwordMatch", function(value, element) {
            var password = $("#password").val();
            var confirmPassword = value;
            return password === confirmPassword;
        }, "Passwords do not match.");

        $("#manage_form").validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "phone") {
                    var a = element.parent("div.input-group-merge")
                    error.insertAfter(a);
                } else {
                    error.insertAfter(
                    element); // For other fields, place the error message after the input element
                }
            },
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

@endsection
