<h3>
    <div class="media">
        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-outline"></i></div>
        <div class="media-body">
            <div class="bd-wizard-step-title">About</div>
            <div class="bd-wizard-step-subtitle">Step 1</div>
        </div>
    </div>
</h3>
<section>
    <div class="content-wrapper">
        <h4 class="section-heading">Enter your Personal details </h4>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control required" placeholder="First Name" value="{{ $data['first_name']??old('first_name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{ $data['last_name']??old('last_name') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control required" placeholder="Phone Number" value="{{ $data['phone']??old('phone') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control required" placeholder="Email Address" value="{{ $data['email']??old('email') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="telephone">Telephone</label>
                <input type="tel" name="agents_address[telephone]" id="telephone" class="form-control"
                    placeholder="Telephone Number" value="{{ $agents_address['telephone']??old('telephone') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="birth_date">Date of Birth</label>
                <input name="agents_address[birth_date]" id="birth_date" class="form-control required flatpickr"
                    placeholder="Date of Birth" value="{{ $agents_address['birth_date']??old('birth_date') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="birth_city">Birth City</label>
                <input type="text" name="agents_address[birth_city]" id="birth_city" class="form-control" placeholder="Birth City" value="{{ $agents_address['birth_city']??old('birth_city') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="profile_img">Profile Picture</label>
                <input type="file" name="profile_img" id="profile_img" class="form-control"
                    placeholder="Profile Picture">
                    @if(isset($data['profile_img']))
                    <div class="col-md-6 mt-2"></div>
                    <div class="col-md-6 mt-2">
                        <a href="{{ asset('uploads/users/'. $data['profile_img']) }}" target="_blank">{{ $data['profile_img'] }}</a>
                    </div>
                    @endif
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control {{ empty($data['password'])?'required':'' }}" placeholder="Password" value="{{ old('password') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ empty($data['password'])?'required':'' }}"
                    placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
            </div>
        </div>
    </div>
</section>
