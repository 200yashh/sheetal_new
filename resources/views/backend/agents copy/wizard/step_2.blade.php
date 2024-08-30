<h3>
    <div class="media">
        <div class="bd-wizard-step-icon"><i class="mdi mdi-bank"></i></div>
        <div class="media-body">
            <div class="bd-wizard-step-title">Address</div>
            <div class="bd-wizard-step-subtitle">Step 2</div>
        </div>
    </div>
</h3>
<section>
    <div class="content-wrapper">
        <h4 class="section-heading">Home Address </h4>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="h_country" class="sr-only">Country</label>
                <select name="agents_address[h_country]" id="h_country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach (config('constant.countries') as $key => $value)
                    <option value="{{ $key }}" {{ isset($agents_address['h_country']) && $agents_address['h_country'] == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="h_state" class="sr-only">State</label>
                <select name="agents_address[h_state]" id="h_state" class="form-control">
                    <option value="">Select State</option>
                    @foreach (config('constant.countries') as $key => $value)
                    <option value="{{ $key }}" {{ isset($agents_address['h_state']) && $agents_address['h_state'] == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="h_city" class="sr-only">City</label>
                <select name="agents_address[h_city]" id="h_city" class="form-control">
                    <option value="">Select City</option>
                    @foreach (config('constant.countries') as $key => $value)
                    <option value="{{ $key }}" {{ isset($agents_address['h_city']) && $agents_address['h_city'] == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="h_location" class="sr-only">Location</label>
                <input type="text" name="agents_address[h_location]" id="h_location" class="form-control" placeholder="Location" value="{{ $agents_address['h_location']??old('h_location') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="h_detail_address" class="sr-only">Detail Address</label>
                <textarea name="agents_address[h_detail_address]" id="h_detail_address" class="form-control" placeholder="Detail Address">{{ $agents_address['h_detail_address']??old('h_detail_address') }}</textarea>
            </div>
        </div>
        <h4 class="section-heading">Business Address </h4>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="b_country" class="sr-only">Country</label>
                <select name="agents_address[b_country]" id="b_country" class="form-control">
                    <option value="">Select Country</option>
                    @foreach (config('constant.countries') as $cK => $cL)
                    <option value="{{ $cK }}" {{ isset($agents_address['b_country']) && $agents_address['b_country'] == $cK ? 'selected' : '' }}>{{ $cL }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="b_state" class="sr-only">State</label>
                <select name="agents_address[b_state]" id="b_state" class="form-control">
                    <option value="">Select State</option>
                    @foreach (config('constant.countries') as $cK => $cL)
                    <option value="{{ $cK }}" {{ isset($agents_address['b_state']) && $agents_address['b_state'] == $cK ? 'selected' : '' }}>{{ $cL }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="b_city" class="sr-only">City</label>
                <select name="agents_address[b_city]" id="b_city" class="form-control">
                    <option value="">Select City</option>
                    @foreach (config('constant.countries') as $cK => $cL)
                    <option value="{{ $cK }}" {{ isset($agents_address['b_city']) && $agents_address['b_city'] == $cK ? 'selected' : '' }}>{{ $cL }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="b_location" class="sr-only">Location</label>
                <input type="text" name="agents_address[b_location]" id="b_location" class="form-control" placeholder="Location" value="{{ $agents_address['b_location']??old('b_location') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="b_detail_address" class="sr-only">Detail Address</label>
                <textarea name="agents_address[b_detail_address]" id="b_detail_address" class="form-control" placeholder="Detail Address">{{ $agents_address['b_detail_address']??old('b_detail_address') }}</textarea>
            </div>
        </div>
    </div>
</section>
