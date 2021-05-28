@extends('layouts.site')
@section('title', 'Register')
@section('content')
<div class="section-title-page login area-bg area-bg_dark area-bg_op_60">
    <div class="area-bg__inner">
      <div class="container text-center">
        <h1 class="b-title-page">Register</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
          </ol>
        </nav>
        <!-- end .breadcrumb-->

      </div>
    </div>
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dealer Registration</div>

                <div class="card-body">
                    <form method="POST" action="/auth/dealer">
                        @csrf

                        <div class="form-group row">
                            <label for="registered_name" class="col-md-4 col-form-label text-md-right">Registered Name</label>
                            <div class="col-md-6">
                                <input id="registered_name" type="text" class="form-control @error('registered_name') is-invalid @enderror" name="registered_name" value="{{ old('registered_name') }}" required autocomplete="registered_name" autofocus>

                                @error('registered_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trading_name" class="col-md-4 col-form-label text-md-right">Trading Name</label>
                            <div class="col-md-6">
                                <input id="trading_name" type="text" class="form-control @error('trading_name') is-invalid @enderror" name="trading_name" value="{{ old('trading_name') }}" required autocomplete="trading_name" autofocus>

                                @error('trading_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">VAT Number</label>
                            <div class="col-md-6">
                                <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}"  autocomplete="vat_number" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="physical_address" class="col-md-4 col-form-label text-md-right">Physical Address</label>

                            <div class="col-md-6">
                                <textarea id="physical_address" type="physical_address" class="form-control @error('physical_address') is-invalid @enderror" name="physical_address"  required autocomplete="physical_address">{{ old('physical_address') }}</textarea>

                                @error('physical_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_person" class="col-md-4 col-form-label text-md-right">Contact Person</label>
                            <div class="col-md-6">
                                <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ (auth()->user()->name)? auth()->user()->name:old('contact_person') }}" required autocomplete="contact_person" autofocus>

                                @error('contact_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>
                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}"  autocomplete="website" autofocus>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ (auth()->user()->email) ? auth()->user()->email : old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
