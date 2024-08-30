@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master /</span> {{ $page_title }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            {!! Helper::getDismissableErrorAlert($errors) !!}
            <form action="{{ $action }}" id="manage_form" method="POST">
                @csrf
                @if (!empty($data['id']))
                    @method('PUT')
                @endif
                <div class="card mb-4">
                    <h5 class="card-header">Package</h5>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="package_collection" value="{{ $packages??"" }}">
                            <input type="hidden" id="pre_slug" value="deluxe">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Package Name <span class="text-danger font-initial">*</span></label>
                                <input class="form-control required" type="text" id="name" name="name"
                                    value="{{ $data['name'] ?? '' }}" autofocus />
                                    <div class="packageDiv"></div>
                            </div>
                        </div>
                        <div class="mt-2">
                            {!! Helper::getFormSubmitButton() !!}
                            {!! Helper::getFormCancelButton(route('master_package.index')) !!}
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
        </div>
    </div>
    <script>
    $("#manage_form").validate();
    </script>
    <script>
        $(document).ready(function(){
            $("#name").keyup(function(){
                var name = $(this).val();
            $.ajax({
                type: 'POST',
                data: {
                    slug: name,
                    "_token": "{{ csrf_token() }}",
                },
                url: "{!! route('slugify.ajax', 1) !!}",
                success: function(data) {
                    if (data.slug) {
                        if($("#pre_slug").val() != data.slug){
                            if ($.inArray(data.slug, package()) !== -1) {
                                $(".packageDiv").html('<label id="name-error" class="error" for="name" style="">' + name + ' already exists.' + '</label>');
                                $("#submit").prop("disabled", true);
                            }else{
                                $(".packageDiv").html("");
                                $("#submit").prop("disabled", false);
                            }
                        }
                    }
                }
            })
        })

        function package(){
            var package_collection = JSON.parse($('#package_collection').val());
            return package_collection;
        }
    
    })
    </script>
    @endsection
