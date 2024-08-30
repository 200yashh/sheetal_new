@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Agents /</span> {{ $page_title }}
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
                    <h5 class="card-header">About</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ !empty($data['profile_img']) ? asset('uploads/users/' . $data['profile_img']) : asset('assets/img/avatars/2.jpg') }}"
                                alt="user-avatar" class="d-block rounded" height="100" width="100"
                                id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Profile</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="profile_img" class="account-file-input"
                                        hidden accept="image/*" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_name" class="form-label">First Name </label>
                                <input class="form-control required" type="text" id="first_name" name="first_name"
                                    value="{{ $data['first_name'] ?? old('first_name') }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="last_name" class="form-label">Last Name </label>
                                <input class="form-control required" type="text" name="last_name" id="last_name"
                                    value="{{ $data['last_name'] ?? old('last_name') }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phone">Phone Number <span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge hithere">
                                    <span class="input-group-text">+91</span>
                                    <input type="text" id="phone" name="phone" class="form-control required digits"
                                        value="{{ $data['phone'] ?? old('phone') }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email Address </label>
                                <input class="form-control required email" type="text" id="email" name="email"
                                    value="{{ $data['email'] ?? old('email') }}"
                                    {{ !empty($data['id']) ? 'readonly' : '' }} />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="telephone">Telephone <span
                                        class="text-danger">*</span></label>
                                <div class="hithere">
                                    <input type="text" id="telephone" name="agents_address[telephone]"
                                        class="form-control required"
                                        value="{{ $agents_address['telephone'] ?? old('telephone') }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="birth_date" class="col-form-label">Date of Birth <span
                                        class="text-danger">*</span></label>
                                <div class="hithere">
                                    <input class="form-control required" type="date" name="agents_address[birth_date]"
                                        value="{{ $agents_address['birth_date'] ?? old('birth_date') }}" id="birth_date" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="birth_city">Birth City </label>
                                <select id="birth_city" class="select2 form-select required"
                                    name="agents_address[birth_city]">
                                    <option value="">Select</option>
                                    @foreach ($cities_list ?? [] as $cK => $cL)
                                        <option value="{{ $cK }}"
                                            {{ isset($agents_address['birth_city']) && $agents_address['birth_city'] == $cK ? 'selected' : '' }}>
                                            {{ $cL }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"
                                    class="form-control {{ empty($data['password']) ? 'required' : '' }} password"
                                    id="password" name="password" value="{{ old('password') }}" minlength="6" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password"
                                    class="form-control {{ empty($data['password']) ? 'required' : '' }} password"
                                    id="password_confirmation" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" minlength="6" />
                            </div>
                        </div>
                    </div>
                </div>
                @if ($isAgent || ($isSuperAdmin && !empty($data['id'])))
                    <h4 class="card-header">Address</h4>
                    <div class="card mb-4">
                        <hr class="my-0">
                        <h5 class="card-header">Home Address</h5>
                        <div class="card-body mt-4">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="h_country">Country </label>
                                    <select id="h_country" class="select2 form-select required"
                                        name="agents_address[h_country]">
                                        <option value="">Select Country</option>
                                        @foreach ($countries_list ?? [] as $cK => $cL)
                                            <option value="{{ $cK }}"
                                                {{ isset($agents_address['h_country']) && $agents_address['h_country'] == $cK ? 'selected' : '' }}>
                                                {{ $cL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="h_state">State</label>
                                    <select id="h_state" class="select2 form-select required"
                                        name="agents_address[h_state]">
                                        <option value="">Select</option>
                                        @foreach ($states_list ?? [] as $cK => $cL)
                                            <option value="{{ $cK }}"
                                                {{ isset($agents_address['h_state']) && $agents_address['h_state'] == $cK ? 'selected' : '' }}>
                                                {{ $cL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="h_city">City</label>
                                    <select id="h_city" class="select2 form-select required"
                                        name="agents_address[h_city]">
                                        <option value="">Select</option>
                                        @foreach ($cities_list ?? [] as $cK => $cL)
                                            <option value="{{ $cK }}"
                                                {{ isset($agents_address['h_city']) && $agents_address['h_city'] == $cK ? 'selected' : '' }}>
                                                {{ $cL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="h_location" class="form-label">Location </label>
                                    <input class="form-control required" type="text" id="h_location"
                                        name="agents_address[h_location]"
                                        value="{{ $agents_address['h_location'] ?? old('h_location') }}" />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="h_detail_address" class="form-label">Detail Address </label>
                                    <textarea class="form-control" type="text" id="h_detail_address" name="agents_address[h_detail_address]">{{ $agents_address['h_detail_address'] ?? old('h_detail_address') }}</textarea>
                                </div>

                            </div>
                        </div>
                        <hr class="my-0">
                        <h5 class="card-header">Business Address</h5>
                        <div class="card-body mt-4">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="b_country">Country </label>
                                    <select id="b_country" class="select2 form-select required"
                                        name="agents_address[b_country]">
                                        <option value="">Select Country</option>
                                        @foreach ($countries_list ?? [] as $cK => $cL)
                                            <option value="{{ $cK }}"
                                                {{ isset($agents_address['b_country']) && $agents_address['b_country'] == $cK ? 'selected' : '' }}>
                                                {{ $cL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="b_state">State</label>
                                    <select id="b_state" class="select2 form-select required"
                                        name="agents_address[b_state]">
                                        <option value="">Select</option>
                                        @foreach ($states_list ?? [] as $cK => $cL)
                                            <option value="{{ $cK }}"
                                                {{ isset($agents_address['b_state']) && $agents_address['b_state'] == $cK ? 'selected' : '' }}>
                                                {{ $cL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="b_city">City</label>
                                    <select id="b_city" class="select2 form-select required"
                                        name="agents_address[b_city]">
                                        <option value="">Select</option>
                                        @foreach ($cities_list ?? [] as $cK => $cL)
                                            <option value="{{ $cK }}"
                                                {{ isset($agents_address['b_city']) && $agents_address['b_city'] == $cK ? 'selected' : '' }}>
                                                {{ $cL }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="b_location" class="form-label">Location </label>
                                    <input class="form-control required" type="text" id="b_location"
                                        name="agents_address[b_location]"
                                        value="{{ $agents_address['b_location'] ?? old('b_location') }}" />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="b_detail_address" class="form-label">Detail Address </label>
                                    <textarea class="form-control" type="text" id="b_detail_address" name="agents_address[b_detail_address]">{{ $agents_address['b_detail_address'] ?? old('b_detail_address') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-header">Documents</h4>
                    <div class="card mb-4">
                        <hr class="my-0">
                        <h5 class="card-header">Documents will let us do...</h5>
                        <div class="card-body mt-4">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="aadhaar_no" class="form-label">Aadhaar Number </label>
                                    <input class="form-control required" type="text" id="aadhaar_no"
                                        name="agents_other_details[aadhaar_no]"
                                        value="{{ $agents_other_details['aadhaar_no'] ?? old('aadhaar_no') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pan_no" class="form-label">Pan Number </label>
                                    <input class="form-control required" type="text" id="pan_no"
                                        name="agents_other_details[pan_no]"
                                        value="{{ $agents_other_details['pan_no'] ?? old('pan_no') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="voter_id_no" class="form-label">Voter Id Number </label>
                                    <input class="form-control required" type="text" id="voter_id_no"
                                        name="agents_other_details[voter_id_no]"
                                        value="{{ $agents_other_details['voter_id_no'] ?? old('voter_id_no') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="passport_no" class="form-label">Passport Number </label>
                                    <input class="form-control required" type="text" id="passport_no"
                                        name="agents_other_details[passport_no]"
                                        value="{{ $agents_other_details['passport_no'] ?? old('passport_no') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="passport_issue_date" class="col-form-label">Passport Issue Date <span
                                            class="text-danger">*</span></label>
                                    <div class="hithere">
                                        <input class="form-control required" type="date"
                                            name="agents_other_details[passport_issue_date]"
                                            value="{{ $agents_other_details['passport_issue_date'] ?? old('passport_issue_date') }}"
                                            id="passport_issue_date" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="passport_expiry_date" class="col-form-label">Passport Expiry <span
                                            class="text-danger">*</span></label>
                                    <div class="hithere">
                                        <input class="form-control required" type="date"
                                            name="agents_other_details[passport_expiry_date]"
                                            value="{{ $agents_other_details['passport_expiry_date'] ?? old('passport_expiry_date') }}"
                                            id="passport_expiry_date" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="passport_place_of_issue" class="form-label">Passport Place of
                                        Issue</label>
                                    <input class="form-control required" type="text" id="passport_place_of_issue"
                                        name="agents_other_details[passport_place_of_issue]"
                                        value="{{ $agents_other_details['passport_place_of_issue'] ?? old('passport_place_of_issue') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="bank_name" class="form-label">Bank Name</label>
                                    <input class="form-control required" type="text" id="bank_name"
                                        name="agents_other_details[bank_name]"
                                        value="{{ $agents_other_details['bank_name'] ?? old('bank_name') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input class="form-control required" type="text" id="account_number"
                                        name="agents_other_details[account_number]"
                                        value="{{ $agents_other_details['account_number'] ?? old('account_number') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="ifsc_code" class="form-label">IFSC Code</label>
                                    <input class="form-control required" type="text" id="ifsc_code"
                                        name="agents_other_details[ifsc_code]"
                                        value="{{ $agents_other_details['ifsc_code'] ?? old('ifsc_code') }}" />
                                </div>

                            </div>
                        </div>
                    </div>
                    <h4 class="card-header">Other Info</h4>
                    <div class="card mb-4">
                        <hr class="my-0">
                        <h5 class="card-header">Tell us more about your agency</h5>
                        <div class="card-body mt-4">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="company_name" class="form-label">Company Name </label>
                                    <input class="form-control required" type="text" id="company_name"
                                        name="agents_other_details[company_name]"
                                        value="{{ $agents_other_details['company_name'] ?? old('company_name') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="shop_act_license_no" class="form-label">Shop Act License Number</label>
                                    <input class="form-control required" type="text" id="shop_act_license_no"
                                        name="agents_other_details[shop_act_license_no]"
                                        value="{{ $agents_other_details['shop_act_license_no'] ?? old('shop_act_license_no') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="iata_license_no" class="form-label">IATA License Number </label>
                                    <input class="form-control" type="text" id="iata_license_no"
                                        name="agents_other_details[iata_license_no]"
                                        value="{{ $agents_other_details['iata_license_no'] ?? old('iata_license_no') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="hint_questions" class="form-label">Hint Questions</label>
                                    <input class="form-control required" type="text" id="hint_questions"
                                        name="agents_other_details[hint_questions]"
                                        value="{{ $agents_other_details['hint_questions'] ?? old('hint_questions') }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="company_logo" class="form-label">Company Logo</label>
                                    <input class="form-control" type="file" id="company_logo" name="company_logo"
                                        value="{{ $agents_other_details['company_logo'] ?? old('company_logo') }}"
                                        accept="image/*" />
                                    @if (isset($agents_other_details['company_logo']))
                                        <div class="col-md-6 mt-2">
                                            <a href="{{ asset('uploads/users/' . $agents_other_details['company_logo']) }}"
                                                target="_blank">{{ $agents_other_details['company_logo'] }}</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="office_photo" class="form-label">Office photo</label>
                                    <input class="form-control" type="file" id="office_photo" name="office_photo"
                                        value="{{ $agents_other_details['office_photo'] ?? old('office_photo') }}"
                                        accept="image/*" />
                                    @if (isset($agents_other_details['office_photo']))
                                        @if (!isset($agents_other_details['company_logo']))
                                            <div class="col-md-6 mt-2"></div>
                                        @endif
                                        <div class="col-md-6 mt-2">
                                            <a href="{{ asset('uploads/users/' . $agents_other_details['office_photo']) }}"
                                                target="_blank">{{ $agents_other_details['office_photo'] }}</a>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                {!! Helper::getFormSubmitButton() !!}
                {!! Helper::getFormCancelButton(route('agents.index')) !!}

            </form>
        </div>
    </div>
    <script>
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
