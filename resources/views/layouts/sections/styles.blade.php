<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/boxicons.css')) }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />

<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
<link rel="stylesheet" href="{{ asset('assets/css/themesbase_jquery-ui.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('assets/datatable/datatables.bundle.rtl.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/css/datatable.jqueryui.min.css') }}" /> --}}
{{-- <link href="{{ asset('assets/css/datatable_custom.css') }}" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/datatable/datatable.bundle.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" />
<link href="{{ asset('assets/flaticon/css/uicons-regular-rounded.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')

<style>
    .font-initial{
        font-size: initial !important;
    }

    .row{
          /* margin-left: $spacer !important; */
    }
</style>