<h3>
    <div class="media">
        <div class="bd-wizard-step-icon"><i class="mdi mdi-account-check-outline"></i>
        </div>
        <div class="media-body">
            <div class="bd-wizard-step-title">Documents </div>
            <div class="bd-wizard-step-subtitle">Step 3</div>
        </div>
    </div>
</h3>
<section>
    <div class="content-wrapper">
        <h4 class="section-heading mb-5">Documents will let us do ...</h4>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="aadhaar_no" class="sr-only">Aadhaar Number</label>
                <input type="text" name="agents_other_details[aadhaar_no]" id="aadhaar_no" class="form-control" placeholder="Aadhaar Number" value="{{ $agents_other_details['aadhaar_no']??old('aadhaar_no') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="pan_no" class="sr-only">Pan Number</label>
                <input type="text" name="agents_other_details[pan_no]" id="pan_no" class="form-control" placeholder="Pan Number" value="{{ $agents_other_details['pan_no']??old('pan_no') }}">
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="voter_id_no" class="sr-only">Voter Id Number</label>
                <input type="text" name="agents_other_details[voter_id_no]" id="voter_id_no" class="form-control" placeholder="Voter Id Number" value="{{ $agents_other_details['voter_id_no']??old('voter_id_no') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="passport_no" class="sr-only">Passport Number</label>
                <input type="text" name="agents_other_details[passport_no]" id="passport_no" class="form-control" placeholder="Passport Number" value="{{ $agents_other_details['passport_no']??old('passport_no') }}">
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="passport_issue_date" class="sr-only">Passport Issue Date</label>
                <input type="text" name="agents_other_details[passport_issue_date]" id="passport_issue_date" class="form-control flatpickr" placeholder="Passport Issue Date" value="{{ $agents_other_details['passport_issue_date']??old('passport_issue_date') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="passport_expiry_date" class="sr-only">Passport Expiry</label>
                <input type="text" name="agents_other_details[passport_expiry_date]" id="passport_expiry_date" class="form-control flatpickr" placeholder="Passport Expiry" value="{{ $agents_other_details['passport_expiry_date']??old('passport_expiry_date') }}">
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="passport_place_of_issue" class="sr-only">Passport Place of Issue</label>
                <input type="text" name="agents_other_details[passport_place_of_issue]" id="passport_place_of_issue" class="form-control" placeholder="Passport Place of Issue" value="{{ $agents_other_details['passport_place_of_issue']??old('passport_place_of_issue') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="bank_name" class="sr-only">Bank Name</label>
                <input type="text" name="agents_other_details[bank_name]" id="bank_name" class="form-control" placeholder="Bank Name" value="{{ $agents_other_details['bank_name']??old('bank_name') }}">
            </div>  
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="account_number" class="sr-only">Account Number</label>
                <input type="text" name="agents_other_details[account_number]" id="account_number" class="form-control" placeholder="Account Number" value="{{ $agents_other_details['account_number']??old('account_number') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="ifsc_code" class="sr-only">IFSC Code</label>
                <input type="text" name="agents_other_details[ifsc_code]" id="ifsc_code" class="form-control" placeholder="IFSC Code" value="{{ $agents_other_details['ifsc_code']??old('ifsc_code') }}">
            </div>  
        </div>
    </div>
</section>
