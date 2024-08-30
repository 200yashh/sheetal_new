<h3>
    <div class="media">
        <div class="bd-wizard-step-icon"><i class="mdi mdi-emoticon-outline"></i></div>
        <div class="media-body">
            <div class="bd-wizard-step-title">Other Info</div>
            <div class="bd-wizard-step-subtitle">Step 4</div>
        </div>
    </div>
</h3>
<section>
    <div class="content-wrapper">
        <h4 class="section-heading mb-5">Tell us more about you</h4>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="company_name" class="sr-only">Company Name</label>
                <input type="text" name="agents_other_details[company_name]" id="company_name" class="form-control" placeholder="Company Name" value="{{ $agents_other_details['company_name']??old('company_name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="shop_act_license_no" class="sr-only">Shop Act License Number</label>
                <input type="text" name="agents_other_details[shop_act_license_no]" id="shop_act_license_no" class="form-control" placeholder="Shop Act License Number" value="{{ $agents_other_details['shop_act_license_no']??old('shop_act_license_no') }}">
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="iata_license_no" class="sr-only">IATA License Number</label>
                <input type="text" name="agents_other_details[iata_license_no]" id="iata_license_no" class="form-control" placeholder="IATA License Number" value="{{ $agents_other_details['iata_license_no']??old('iata_license_no') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="hint_questions" class="sr-only">Hint Questions</label>
                <input type="text" name="agents_other_details[hint_questions]" id="hint_questions" class="form-control" placeholder="Hint Questions" value="{{ $agents_other_details['hint_questions']??old('hint_questions') }}">
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="company_logo" class="sr-only">Company Logo</label>
                <input type="file" name="company_logo" id="company_logo" class="form-control" placeholder="Company Logo">
                @if(isset($agents_other_details['company_logo']))
                <div class="col-md-6 mt-2">
                    <a href="{{ asset('uploads/users/'. $agents_other_details['company_logo']) }}" target="_blank">{{ $agents_other_details['company_logo'] }}</a>
                </div>
                @endif 
            </div> 
            <div class="form-group col-md-6">
                <label for="office_photo" class="sr-only">Office photo</label>
                <input type="file" name="office_photo" id="office_photo" class="form-control" placeholder="Office photo">
                @if(isset($agents_other_details['office_photo']))
                    @if(!isset($agents_other_details['office_photo']))
                        <div class="col-md-6 mt-2"></div>
                    @endif
                <div class="col-md-6 mt-2">
                    <a href="{{ asset('uploads/users/'. $agents_other_details['office_photo']) }}" target="_blank">{{ $agents_other_details['office_photo'] }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
