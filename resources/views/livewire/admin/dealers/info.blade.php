<div class="ms-3 me-3">
<h3>{{ ($data->trading_name>'') ? $data->trading_name : $data->registered_name }}</h3>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">Detail</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
    <div class="mt-3 mb-3 row">
        <label for="account_number" class="col-sm-4 col-form-label">Account Number</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="account_number" value="{{ $data->account_number }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="registered_name" class="col-sm-4 col-form-label">Registered Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="registered_name" value="{{ $data->registered_name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="trading_name" class="col-sm-4 col-form-label">Trading Name</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="trading_name" value="{{ $data->trading_name }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="vat_number" class="col-sm-4 col-form-label">VAT Number</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="vat_number" value="{{ $data->vat_number }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="physical_address" class="col-sm-4 col-form-label">VAT Number</label>
        <div class="col-sm-8">
            <textarea class="form-control form-control-sm" id="physical_address" rows="4">{!! $data->physical_address !!}</textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="contact_person" class="col-sm-4 col-form-label">Contact Person</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="contact_person" value="{{ $data->contact_person }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="mobile" value="{{ $data->mobile }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="office_number" class="col-sm-4 col-form-label">Office Number</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="office_number" value="{{ $data->office_number }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="website" class="col-sm-4 col-form-label">Website</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="website" value="{{ $data->website }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="email" value="{{ $data->email }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="logo" class="col-sm-4 col-form-label">Logo</label>
        <div class="col-sm-8">
            <input type="text" class="form-control form-control-sm" id="logo" value="{{ $data->logo }}">
        </div>
        @if ($data->logo>'')
            <img src="/images/logos/{{ $data->logo }}">
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm">Update</button>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
</div>
