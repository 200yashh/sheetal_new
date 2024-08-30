<!-- laravel style -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/datatable.min.js') }}" defer></script>
{{-- <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js" defer></script> --}}
<script src="{{ asset('assets/datatable/datatables.bundle.js') }}" defer></script>
{{-- <script src="{{ asset('assets/js/datatable.jqueryui.min.js') }}" defer></script> --}}
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- Common Script -->
<script src="{{ asset('assets/js/common_scripts.js') }}"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- beautify ignore:end -->

<!-- JQUERY STEP -->
{{-- <script src="{{ asset('assets/wizard/js/jquery.steps.js') }}"></script>
<script src="{{ asset('assets/wizard/js/main.js') }}"></script> --}}

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
</script>

<!-- <script src="{{ asset('frontend/assets/custom_js/main.js') }}"></script> -->