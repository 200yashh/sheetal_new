@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Settings /</span> {{ $page_title }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            {!! Helper::getDismissableAlert() !!}
            {!! Helper::getDismissableErrorAlert($errors) !!}
            <form action="{{ $action }}" id="manage_form" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($data['id']))
                    @method('PUT')
                @endif
                <div class="card mb-4">
                    <h5 class="card-header">{!! Helper::getIcon(null, 'settings') !!}</h5>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="mb-3 col-md-12">
                                <label for="app_name" class="form-label">Application Name </label>
                                <input type="text" class="form-control required" id="app_name" name="app_name"
                                    value="{{ $data['app_name'] ?? old('app_name') }}" placeholder="" />
                            </div> --}}
                            <div class="mb-3 col-md-12">
                                <label for="testing_emails" class="form-label">Test Emails </label>
                                <select id="testing_emails" class="select2 form-select" name="testing_emails[]" multiple="">
                                   @foreach($data['testing_emails']??[] as $tags)
                                    <option value="{{$tags}}" selected>{{$tags}}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Multiple emails can be added here.</small><br>
                                <small class="text-muted">After adding email here all mails from entire project will be forwarded to the above added email addresses.</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            {!! Helper::getFormSubmitButton() !!}
                            {!! Helper::getFormCancelButton(route('settings.index')) !!}
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
        </div>
    </div>
    <script>
        $("#manage_form").validate();

        // Initiate Select2
        $(".select2").select2({
            tags: true
        });

    </script>
@endsection
