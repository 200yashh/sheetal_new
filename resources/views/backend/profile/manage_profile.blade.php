@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Users /</span> {{ $page_title }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            {!! Helper::getDismissableErrorAlert($errors) !!}
            {!! Helper::getDismissableAlert() !!}
            <form action="{{ $action }}" id="manage_form" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($data['id']))
                    @method('PUT')
                @endif
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ !empty($data['profile_img']) ? asset('users/'.$data['profile_img']) : asset('assets/img/avatars/2.jpg') }}" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="profile_img" class="account-file-input"
                                        hidden accept="image/*" />
                                 </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                {{-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_name" class="form-label">First Name <span class="text-danger font-initial">*</span></label>
                                <input class="form-control required" type="text" id="first_name" name="first_name"
                                    value="{{ $data['first_name'] ?? old('first_name') }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="last_name" class="form-label">Last Name <span class="text-danger font-initial">*</span></label>
                                <input class="form-control required" type="text" name="last_name" id="last_name"
                                    value="{{ $data['last_name'] ?? old('last_name') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail <span class="text-danger font-initial">*</span></label>
                                <input class="form-control required email" type="text" id="email" name="email"
                                    value="{{ $data['email'] ?? old('email') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phone">Phone Number <span class="text-danger font-initial">*</span></label>
                                <div class="input-group input-group-merge hithere">
                                    <span class="input-group-text">+91</span>
                                    <input type="text" id="phone" name="phone" class="form-control required number"
                                        value="{{ $data['phone'] ?? old('phone') }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address <span class="text-danger font-initial">*</span></label>
                                <input type="text" class="form-control required" id="address" name="address"
                                    value="{{ $data['address'] ?? old('address') }}" placeholder="Address" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State <span class="text-danger font-initial">*</span></label>
                                <input class="form-control required" type="text" id="state" name="state"
                                    value="{{ $data['state'] ?? old('state') }}" placeholder="California" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zipcode" class="form-label">Zip Code <span class="text-danger font-initial">*</span></label>
                                <input type="text" class="form-control required digits" id="zipcode" name="zipcode"
                                    value="{{ $data['zipcode'] ?? old('zipcode') }}" placeholder="231465" maxlength="10" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">Country <span class="text-danger font-initial">*</span></label>
                                <select id="country" class="select2 form-select required" name="country">
                                    <option value="">Select</option>
                                    @foreach (config('constant.countries') as $cV => $cL)
                                        <option value="{{ $cV }}"
                                            {{ old('country', isset($data['country']) ? $data['country'] : '') == $cV ? 'selected' : '' }}>
                                            {{ $cL }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password<span class="text-danger font-initial">*</span></label>
                                <input type="password" class="form-control required password" id="password" name="password"
                                    value="{{ old('password') }}" placeholder="example@123" minlength="6" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password<span class="text-danger font-initial">*</span></label>
                                <input type="password" class="form-control required password" id="password_confirmation" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" placeholder="example@123" minlength="6" />
                            </div>
                        </div>
                        <div class="mt-2">
                            {!! Helper::getFormSubmitButton() !!}
                            {!! Helper::getFormCancelButton(url()->previous()) !!}
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
        </div>
    </div>
<script>
    $.validator.addMethod("passwordMatch", function(value, element) {
        var password = $("#password").val();
        var confirmPassword = value;
        return password === confirmPassword;
    }, "Passwords do not match.");

    $("#manage_form").validate({
        errorPlacement: function (error, element) {
            if (element.attr("name") == "phone") {
                var a = element.parent("div.input-group-merge")
                error.insertAfter(a);
            } else {
                error.insertAfter(element); // For other fields, place the error message after the input element
            }
        },
        rules: {
            password: {
                required: true,
                minlength: 6 // Change the minimum length as needed
            },
            password_confirmation: {
                required: true,
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
