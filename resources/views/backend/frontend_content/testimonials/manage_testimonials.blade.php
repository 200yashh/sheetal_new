@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Frontend /</span> {{ $page_title }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            {!! Helper::getDismissableErrorAlert($errors) !!}
            <form action="{{ $action }}" id="manage_form" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($data['id']))
                    @method('PUT')
                @endif
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control required" id="name" name="name"
                                    value="{{ $data['name'] ?? old('name') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea rows="5" class="form-control required" id="description" name="description">{{ $data['description'] ?? old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="photo" class="form-label">Office photo</label>
                                <input class="form-control" type="file" id="photo" name="photo" accept="image/*" />
                                @if (isset($data['photo']))
                                    <div class="col-md-6 mt-2">
                                        <a href="{{ asset('uploads/testimonials/' . $data['photo']) }}"
                                            target="_blank">{{ $data['photo'] }}</a>
                                    </div>
                                @endif
                            </div>
                            <small class="text-muted">Please upload image with equal height and width</small>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Sequence</label>
                                <input type="number" class="form-control required digits" id="sequence" name="sequence"
                                    value="{{ $data['sequence'] ?? old('sequence') }}" />
                            </div>
                        </div>
                        <div class="mt-2">
                            {!! Helper::getFormSubmitButton() !!}
                            {!! Helper::getFormCancelButton(route('frontend_testimonials.index')) !!}
                        </div>
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
@endsection
