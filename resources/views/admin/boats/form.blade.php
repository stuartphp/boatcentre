@extends('layouts.app')
@section('content')
<form method="POST" id="frmBoat">
@csrf
<input type="hidden" id="action" value="{{ $action }}"/>
<div class="ms-3 me-3">
    <div class="card">
        <div class="card-header"><a href="/admin/boats">Boat Listing</a> / {{ ucwords($action) }}</div>
        <div class="card-body">
          <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="reference">Reference</label>
                <input type="text" class="form-control form-control-sm" name="reference" readonly value="{{ isset($data->reference) ? $data->reference : old('reference') }}"/>
            </div>
            <div class="mb-3">
                <label for="vin_number">VIN No. for Trailer</label>
                <input type="text" class="form-control form-control-sm" name="vin_number" value="{{ isset($data->vin_number) ? $data->vin_number : old('vin_number') }}"/>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-sm" name="name" required value="{{ isset($data->name) ? $data->name : old('name') }}"/>
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="keywords">Keywords (Comma seperated)</label>
                <input type="text" class="form-control form-control-sm" name="keywords" placeholder="key1, key2, key3" value="{{ isset($data->keywords) ? $data->keywords : old('keywords') }}"/>
            </div>
            <div class="mb-3">
                <label for="cof">COF (Certificate of Fitness)</label>
                <input type="text" class="form-control form-control-sm" name="cof" value="{{ isset($data->cof) ? $data->cof : old('cof') }}"/>
            </div>
            <div class="mb-3">
                <label for="boat_manufacturer_id">Manufacturer</label>
                <select class="form-select form-select-sm select" onchange="getModels(this.value)" required name="boat_manufacturer_id" id="boat_manufacturer_id">
                    <option value="" selected>Select</option>
                    @foreach ($manufacturers as $k=>$v )
                    <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
                @error('boat_manufacturer_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="boat_manufacturer_model_id">Model</label>
                <select class="form-select form-select-sm select" id="boat_manufacturer_model_id" onchange="getModelDetail(this.value)" name="boat_manufacturer_model_id" required>
                    <option value="">Select</option>
                </select>
                @error('boat_manufacturer_model_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="main_color">Main Color</label>
                <input type="color" class="form-control form-control-sm" value="{{ isset($data->main_color) ? $data->main_color : old('main_color') }}" name="main_color" required/>

            </div>
            <div class="mb-3">
                <label for="new_used">New/Used</label>
                <select class="form-select form-select-sm" name="new_used" id="new_used">
                    <option value="1">New</option>
                    <option value="0">Used</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="condition">Condition</label>
                <select class="form-select form-select-sm select" name="condition" id="condition" required>
                    @foreach (__('global.condition') as $k=>$v )
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="year_of_manufacture">Year Of Manufacture</label>
                <input type="text" class="form-control form-control-sm" name="year_of_manufacture" value="{{ isset($data->year_of_manufacture) ? $data->year_of_manufacture : old('year_of_manufacture') }}"/>
                @error('year_of_manufacture')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3">
                <label for="hull_construction">Hull Construction</label>
                <select class="form-select form-select-sm" name="hull_construction" id="hull_construction">
                    <option value="Aluminum"f>Aluminum</option>
                    <option value="Carbon Fibre">Carbon Fibre</option>
                    <option value="Fiberglass">Fiberglass</option>
                    <option value="Steel">Steel</option>
                    <option value="Wood">Wood</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">

            <div class="mb-3">
                <label for="province">Province</label>
                <select class="form-select form-select-sm" name="province_id" id="province_id" onchange="getCity(this.value)" required>
                    <option value="">Select</option>
                    @foreach (__('global.province') as $k=>$v )
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="city">City</label>
                <select class="form-select form-select-sm select" data-live-search="true" name="city_id" id="city_id" required></select>
            </div>
            <div class="mb-3">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control form-control-sm" name="short_description" require value="{{ isset($data->short_description) ? $data->short_description : old('short_description') }}"/>
            </div>
            <div class="mb-3">
                <label for="description">Decription</label>
                <textarea id="description" name="description" required>
                    @if (isset($data->description))
                        {!! $data->description !!}
                    @endif
                </textarea>
            </div>
            <div class="mb-3">
                <label for="retail_price">Retail Price</label>
                <input type="text" class="form-control form-control-sm" name="retail_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required value="{{ isset($data->retail_price) ? $data->retail_price : old('retail_price') }}"/>
            </div>
            <div class="mb-3">
                <label for="special_price">Special Price</label>
                <input type="text" class="form-control form-control-sm" name="special_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ isset($data->special_price) ? $data->special_price : old('special_price') }}"/>
            </div>
            <div class="mb-3">
                <label for="special_start">Special Start Date</label>
                <input type="date" class="form-control form-control-sm" name="special_start" value="{{ isset($data->special_start) ? $data->special_start : old('special_start') }}"/>
            </div>
            <div class="mb-3">
                <label for="special_end">Special End Date</label>
                <input type="date" class="form-control form-control-sm" name="special_end" value="{{ isset($data->special_end) ? $data->special_end : old('special_end') }}"/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="weight">Weight</label>
                <input type="text" class="form-control form-control-sm" name="weight" value="{{ isset($data->weight) ? $data->weight : old('weight') }}"/>
            </div>
            <div class="mb-3">
                <label for="loa">LOA (Length overal)</label>
                <input type="text" class="form-control form-control-sm" name="loa" value="{{ isset($data->loa) ? $data->loa : old('loa') }}"/>
            </div>
            <div class="mb-3">
                <label for="beam">Beam (Greatest width of boat)</label>
                <input type="text" class="form-control form-control-sm" name="beam" value="{{ isset($data->beam) ? $data->beam : old('beam') }}"/>
            </div>
            <div class="mb-3">
                <label for="draft">Draft (Depth of water the boat draws)</label>
                <input type="text" class="form-control form-control-sm" name="draft" value="{{ isset($data->draft) ? $data->draft : old('draft') }}"/>
            </div>
            <div class="mb-3">
                <label for="crew">Crew</label>
                <input type="number" class="form-control form-control-sm" name="crew" value="1" value="{{ isset($data->crew) ? $data->crew : old('crew') }}"/>
            </div>
            <div class="mb-3">
                <label for="passengers">Passengers</label>
                <input type="number" class="form-control form-control-sm" name="passengers" value="1" value="{{ isset($data->passengers) ? $data->passengers : old('passengers') }}"/>
            </div>
            <div class="mb-3">
                <label for="fuel_type">Fuel Type</label>
                <select class="form-select form-select-sm" name="fuel_type" id="fuel_type">
                    <option value="1">Diesel</option>
                    <option value="2">Electric / Battery</option>
                    <option value="3" selected>Petrol</option>
                    <option value="4">Nature / Wind</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fuel_tank">Fuel Tank</label>
                <input type="text" class="form-control form-control-sm" name="fuel_tank" value="{{ isset($data->fuel_tank) ? $data->fuel_tank : old('fuel_tank') }}"/>
            </div>
            <div class="mb-3">
                <label for="max_speed">Max Speed</label>
                <input type="text" class="form-control form-control-sm" name="max_speed" value="{{ isset($data->max_speed) ? $data->max_speed : old('max_speed') }}"/>
            </div>
            <div class="mb-3">
                <label for="youtube_link">YouTube Link</label>
                <input type="text" class="form-control form-control-sm" name="youtube_link" value="{{ isset($data->youtube_link) ? $data->youtube_link : old('youtube_link') }}"/>
            </div>
            <div class="mb-3">
                <label for="fb_link">FaceBook Link</label>
                <input type="text" class="form-control form-control-sm" name="fb_link" value="{{ isset($data->fb_link) ? $data->fb_link : old('fb_link') }}"/>
            </div>

        </div>
    </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_sold" @if(isset($data->is_sold) && $data->is_sold==1) checked @endif id="is_sold" name="is_sold">
                        <label class="form-check-label" for="is_sold">
                          Is Sold
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_feature" @if(isset($data->is_feature) && $data->is_feature==1) checked @endif id="is_feature">
                        <label class="form-check-label" for="is_feature">
                          Is Feature
                        </label>
                      </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_approved"
                             @if(isset($data->is_approved) && $data->is_approved==1) checked @endif id="is_approved"
                             @if(auth()->user()->profile > 1) disabled @endif
                             >
                        <label class="form-check-label" for="is_approved">
                          Is Approved
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_active"
                        @if(isset($data->is_active) && $data->is_active==1) checked @endif id="is_active"
                        @if(auth()->user()->profile > 1) disabled @endif>
                        <label class="form-check-label" for="is_active">
                          Is Active
                        </label>
                      </div>
                </div>
                <div class="col-sm-4 text-end"><button type="submit" class="btn btn-primary btn-sm">Save</button></div>
            </div>

        </div>
    </div>

</div>
</form>
@endsection
@section('scripts')
<script>
var boat_id=0;
var model_id=0;
@if(isset($data))
$(function(){
    boat_id= {{ $data->id }};
    model_id= {{ $data->boat_manufacturer_model_id }};
    getCity('{{ $data->province_id }}');
    getModels('{{$data->boat_manufacturer_id}}');
    $('#new_used').val({{ $data->new_used }});
    $('#boat_manufacturer_id').val({{ $data->boat_manufacturer_id }});
    $('#boat_manufacturer_id').trigger('change');
    $('#condition').val({{ $data->condition }});
    $('#hull_construction').val('{{ $data->hull_construction }}');
    $('#fuel_type').val({{ $data->fuel_type }});
});
@endif

    function getCity(val)
    {

        $.ajax({
            url: '/admin/search/city',
            data: {id:val},
            dataType:'JSON',
            method:'POST',
            success: function(data)
            {
                $('#city_id').empty();
                for(var i=0; i<data.length; i++)
                {
                    var Opt = new Option(data[i].text, data[i].id, false, false);
                    $('#city_id').append(Opt);
                }
            },

        }).done(function(d, t, j){
            @if(isset($data->city_id) && $data->city_id)
            $('#province_id').val({{ $data->province_id }});
            $('#city_id').val({{ $data->city_id }});
            $('#city_id').trigger('change');
            @endif;
        });
    }

    function getModels(val)
    {

        $.ajax({
            url: '/admin/search/manufacturers',
            data: {id:val},
            dataType:'JSON',
            method:'POST',
            success: function(data)
            {
                $('#boat_manufacturer_model_id').empty();
                $("#boat_manufacturer_model_id").append('<option value="">Select</option>');
                for(var i=0; i<data.length; i++){
                    $("#boat_manufacturer_model_id").append('<option value="'+data[i]['id']+'">'+data[i]['val']+'</option>');
                }
            }
        }).done(function(d,t,j){
            @if (isset($data->boat_manufacturer_model_id) && $data->boat_manufacturer_model_id)
                $("#boat_manufacturer_model_id").val({{ $data->boat_manufacturer_model_id }});
                $("#boat_manufacturer_model_id").trigger('change');
            @endif
        });
    }

    function getModelDetail(id){
        $.ajax({
            url: '/admin/search/models',
            data: {id:id},
            dataType:'JSON',
            method:'POST',
            success: function(data)
            {
                if(id != model_id)
                {
                    $('#description').summernote('code',data);
                }

            }
        });
    }

    $(function(){
        $('#description').summernote({
            placeholder: 'Enter description',
            tabsize: 2,
            height: 192,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ]
      });
    });

    $('#frmBoat').on('submit', function(e){
        e.preventDefault();
        var action = $('#action').val();
        var data = new FormData(this);
        if(action === 'create')
        {
            $.ajax({
                url:'/admin/boats',
                method: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'JSON',
                success: function (response) {
                    if(response.success){
                        toastr.success('Record Created');
                        window.location.href="/admin/boats";
                    }else{
                        var err='<div class="row"><div class="col-sm-12"><ul class="text-start">';
                        for(let i=0; i<response.error.length; i++)
                        {
                            err += "<li>"+response.error[i]+"</li>";
                        }
                        err +='</ul></div></div>'
                        notice('error', 'Errors Found', err);
                    }
                }
            });
        }
        if(action === 'update')
        {
            data.append('_method', 'PUT');
            $.ajax({
                url:'/admin/boats/'+boat_id,
                method: 'POST',
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'JSON',
                success: function (response) {
                    if(response.success){
                        toastr.success('Update Succesfull');
                        window.location.href="/admin/boats";
                    }else{
                        var err='<div class="row"><div class="col-sm-12"><ul class="text-start">';
                        for(let i=0; i<response.error.length; i++)
                        {
                            err += "<li>"+response.error[i]+"</li>";
                        }
                        err +='</ul></div></div>'
                        notice('error', 'Errors Found', err);
                    }
                }
            });
        }
    });

</script>
@endsection
