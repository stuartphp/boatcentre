@extends('layouts.app')
@section('content')
<form action="/admin/boats/{{ $data->id }}" method="POST">
@csrf
<input type="hidden" name="_method" value="PUT"/>
<div class="ms-3 me-3">
    <div class="card">
        <div class="card-header">Boat Listing / Create</div>
        <div class="card-body">
          <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="reference">Reference</label>
                <input type="text" class="form-control form-control-sm" name="reference" value="{{ $data->reference }}"/>
            </div>
            <div class="mb-3">
                <label for="vin_number">VIN No. for Trailer</label>
                <input type="text" class="form-control form-control-sm" name="vin_number"  value="{{ $data->vin_number }}"/>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-sm" name="name" required value="{{ $data->name }}"/>
            </div>
            <div class="mb-3">
                <label for="keywords">Keywords (Comma seperated)</label>
                <input type="text" class="form-control form-control-sm" name="keywords" placeholder="key1, key2, key3" value="{{ $data->keywords }}"/>
            </div>
            <div class="mb-3">
                <label for="cof">COF (Certificate of Fitness)</label>
                <input type="text" class="form-control form-control-sm" name="cof" value="{{ $data->cof }}"/>
            </div>
            <div class="mb-3">
                <label for="boat_manufacturer_id">Manufacturer</label>
                <select class="form-select form-select-sm select" onchange="getModels(this.value)" required name="boat_manufacturer_id" id="boat_manufacturer_id">
                    <option value="" selected>Select</option>
                    @foreach ($manufacturers as $k=>$v )
                    <option value="{{ $k }}" @if($k==$data->boat_manufacturer_id) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="boat_manufacturer_model_id">Model</label>
                <select class="form-select form-select-sm select" id="boat_manufacturer_model_id" onchange="getModelDetail(this.value)" name="boat_manufacturer_model_id" required>
                    <option value="">Select</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="main_color">Main Color</label>
                <input type="color" class="form-control form-control-sm" value="#ffffff" name="main_color" required value="{{ $data->main_color}}"/>
            </div>
            <div class="mb-3">
                <label for="new_used">New/Used</label>
                <select class="form-select form-select-sm" name="new_used">
                    <option value="1" @if($data->new_used==1) selected @endif>New</option>
                    <option value="0" @if($data->new_used==0) selected @endif>Used</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="condition">Condition</label>
                <select class="form-select form-select-sm select" name="condition" required>
                    @foreach (__('global.condition') as $k=>$v )
                        <option value="{{ $k }}" @if($data->condittion==$k) selected @endif>{{ $v }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="year_of_manufacture">Year Of Manufacture</label>
                <input type="text" class="form-control form-control-sm" name="year_of_manufacture" value="{{ $data->year_of_manufacture }}"/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="hull_construction">Hull Construction</label>
                <input type="text" class="form-control form-control-sm" name="hull_construction" required value="{{ $data->hull_construction }}"/>
            </div>
            <div class="mb-3">
                <label for="province_id">Province</label>
                <select class="form-select form-select-sm" name="province_id" onchange="getCity(this.value)" required>
                    <option value="">Select</option>
                        @foreach (__('global.province') as $k=>$v )
                            <option value="{{ $k }}" @if($k==$data->province_id) selected @endif>{{ $v }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="mb-3">
                <label for="city">City</label>
                <select class="form-select form-select-sm select" data-live-search="true" name="city_id" id="city_id" required></select>
            </div>

            <div class="mb-3">
                <label for="description">Decription</label>
                <textarea id="description" name="description" required>{!! $data->description !!}</textarea>
            </div>
            <div class="mb-3">
                <label for="retail_price">Retail Price</label>
                <input type="text" class="form-control form-control-sm" name="retail_price" value="{{ $data->retail_price }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
            </div>
            <div class="mb-3">
                <label for="special_price">Special Price</label>
                <input type="text" class="form-control form-control-sm" name="special_price" value="{{$data->special_price}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
            </div>
            <div class="mb-3">
                <label for="special_start">Special Start Date</label>
                <input type="date" class="form-control form-control-sm" name="special_start" value="{{$data->special_start}}"/>
            </div>
            <div class="mb-3">
                <label for="special_end">Special End Date</label>
                <input type="date" class="form-control form-control-sm" name="special_end" value="{{$data->special_end}}"/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="weight">Weight</label>
                <input type="text" class="form-control form-control-sm" name="weight" value="{{$data->weight}}"/>
            </div>
            <div class="mb-3">
                <label for="loa">LOA (Length overal)</label>
                <input type="text" class="form-control form-control-sm" name="loa" value="{{$data->loa}}"/>
            </div>
            <div class="mb-3">
                <label for="beam">Beam (Greatest width of boat)</label>
                <input type="text" class="form-control form-control-sm" name="beam" value="{{$data->beam}}"/>
            </div>
            <div class="mb-3">
                <label for="draft">Draft (Depth of water the boat draws)</label>
                <input type="text" class="form-control form-control-sm" name="draft" value="{{$data->draft}}"/>
            </div>
            <div class="mb-3">
                <label for="crew">Crew</label>
                <input type="number" class="form-control form-control-sm" name="crew" value="{{$data->crew}}"/>
            </div>
            <div class="mb-3">
                <label for="passengers">Passengers</label>
                <input type="number" class="form-control form-control-sm" name="passengers" value="{{ $data->passengers}}"/>
            </div>
            <div class="mb-3">
                <label for="fuel_type">Fuel Type</label>
                <select class="form-select form-select-sm" name="fuel_type">
                    <option value="1" @if($data->fuel_type==1) selected @endif>Diesel</option>
                    <option value="2" @if($data->fuel_type==2) selected @endif>Electric / Battery</option>
                    <option value="3" @if($data->fuel_type==3) selected @endif>Petrol</option>
                    <option value="4" @if($data->fuel_type==4) selected @endif>Nature / Wind</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fuel_tank">Fuel Tank</label>
                <input type="text" class="form-control form-control-sm" name="fuel_tank" value="{{ $data->fuel_tank }}"/>
            </div>
            <div class="mb-3">
                <label for="max_speed">Max Speed</label>
                <input type="text" class="form-control form-control-sm" name="max_speed" value="{{$data->max_speed}}"/>
            </div>
            <div class="mb-3">
                <label for="youtube_link">YouTube Link</label>
                <input type="text" class="form-control form-control-sm" name="youtube_link" value="{{ $data->youtube_link }}"/>
            </div>
            <div class="mb-3">
                <label for="fb_link">FaceBook Link</label>
                <input type="text" class="form-control form-control-sm" name="fb_link" value="{{ $data->fb_link }}"/>
            </div>

        </div>
    </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_sold" name="is_sold" @if($data->is_sold==1) checked @endif>
                        <label class="form-check-label" for="is_sold">
                          Is Sold
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_approved" @if($data->is_approved==1) checked @endif>
                        <label class="form-check-label" for="is_approved">
                          Is Approved
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_feature" @if($data->is_feature==1) checked @endif>
                        <label class="form-check-label" for="is_feature">
                          Is Feature
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_active" @if($data->is_active==1) checked @endif>
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
$(function(){
    getCity('{{ $data->province_id }}');
    getModels('{{$data->boat_manufacturer_id}}');

});
    function getCity(val)
    {
        $.ajax({
            url: '/admin/search/city',
            data: {id:val},
            dataType:'JSON',
            method:'POST',
            success: function(data)
            {
                for(var i=0; i<data.length; i++)
                {
                    var Opt = new Option(data[i].text, data[i].id, false, false);
                    $('#city_id').append(Opt);
                }
                $('#city_id').trigger('change');
            }
        }).done(function(d, t, j){
            @if($data->city_id)
            $('#city_id').val({{ $data->city_id }});
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
            @if ($data->boat_manufacturer_model_id)
            $("#boat_manufacturer_model_id").val({{ $data->boat_manufacturer_model_id }});
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
                $('#description').summernote('insertText',data);
            }
        });
    }

    $(function(){
        $('#description').summernote({
            placeholder: 'Enter description',
            tabsize: 2,
            height: 180,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                //['insert', ['link', 'picture', 'video']],
                //['view', ['fullscreen', 'codeview', 'help']]
            ]
      });
    });



</script>
@endsection
