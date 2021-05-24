@extends('layouts.app')
@section('content')
<form action="{{ route('boats.store') }}" method="POST">
@csrf

<div class="ms-3 me-3">
    <div class="card">
        <div class="card-header">Boat Listing / Create</div>
        <div class="card-body">
          <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="reference">Reference</label>
                <input type="text" class="form-control form-control-sm" name="reference"/>
            </div>
            <div class="mb-3">
                <label for="vin_number">VIN No. for Trailer</label>
                <input type="text" class="form-control form-control-sm" name="vin_number"/>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-sm" name="name" required/>
            </div>
            <div class="mb-3">
                <label for="keywords">Keywords (Comma seperated)</label>
                <input type="text" class="form-control form-control-sm" name="keywords" placeholder="key1, key2, key3"/>
            </div>
            <div class="mb-3">
                <label for="cof">COF (Certificate of Fitness)</label>
                <input type="text" class="form-control form-control-sm" name="cof"/>
            </div>
            <div class="mb-3">
                <label for="manufacturer">Manufacturer</label>
                <select class="form-select form-select-sm select" name="manufacturer" onchange="getModels(this.value)" name="manufacturer" required>
                    <option value="" selected>Select</option>
                    @foreach ($manufacturers as $k=>$v )
                    <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="model">Model</label>
                <select class="form-select form-select-sm select" id="model" onchange="getModelDetail(this.value)" name="model" required>
                    <option value="">Select</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="main_color">Main Color</label>
                <input type="color" class="form-control form-control-sm" value="#ffffff" name="main_color" required/>
            </div>
            <div class="mb-3">
                <label for="new_used">New/Used</label>
                <select class="form-select form-select-sm" name="new_used">
                    <option value="1" selected>New</option>
                    <option value="0">Used</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="condition">Condition</label>
                <select class="form-select form-select-sm select" name="condition" required>
                    <option value="10">Gem Mint 100%</option>
                    <option value="9">Mint 95%</option>
                    <option value="8">Near Mint 90%</option>
                    <option value="7">Excellent / Near Mint 85%</option>
                    <option value="6">Excelent 80%</option>
                    <option value="5">Very Good 70%</option>
                    <option value="4">Good 60%</option>
                    <option value="3">Fair 50%</option>
                    <option value="2">Poor 40%</option>
                    <option value="1">Very Poor < 40%</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="year_of_manufacture">Year Of Manufacture</label>
                <input type="text" class="form-control form-control-sm" name="year_of_manufacture"/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="hull_construction">Hull Construction</label>
                <input type="text" class="form-control form-control-sm" name="hull_construction" required/>
            </div>
            <div class="mb-3">
                <label for="province">Province</label>
                <select class="form-select form-select-sm" name="province" onchange="getCity(this.value)" required>
                    <option value="">Select</option>
                        <option value="1">EASTERN CAPE</option>
                        <option value="2">FREE STATE</option>
                        <option value="3">GAUTENG</option>
                        <option value="4">KWAZULU-NATAL</option>
                        <option value="5">LIMPOPO</option>
                        <option value="6">MPUMALANGA</option>
                        <option value="8">NORTH WEST</option>
                        <option value="7">NORTHERN CAPE</option>
                        <option value="9">WESTERN CAPE</option>
                    </select>
            </div>
            <div class="mb-3">
                <label for="city">City</label>
                <select class="form-select form-select-sm select" data-live-search="true" name="city" id="city" required></select>
            </div>

            <div class="mb-3">
                <label for="description">Decription</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="retail">Retail Price</label>
                <input type="text" class="form-control form-control-sm" name="retail" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
            </div>
            <div class="mb-3">
                <label for="special_price">Special Price</label>
                <input type="text" class="form-control form-control-sm" name="special_price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
            </div>
            <div class="mb-3">
                <label for="special_start">Special Start Date</label>
                <input type="date" class="form-control form-control-sm" name="special_start"/>
            </div>
            <div class="mb-3">
                <label for="special_end">Special End Date</label>
                <input type="date" class="form-control form-control-sm" name="special_end"/>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="weight">Weight</label>
                <input type="text" class="form-control form-control-sm" name="weight"/>
            </div>
            <div class="mb-3">
                <label for="loa">LOA (Length overal)</label>
                <input type="text" class="form-control form-control-sm" name="loa"/>
            </div>
            <div class="mb-3">
                <label for="beam">Beam (Greatest width of boat)</label>
                <input type="text" class="form-control form-control-sm" name="beam"/>
            </div>
            <div class="mb-3">
                <label for="draft">Draft (Depth of water the boat draws)</label>
                <input type="text" class="form-control form-control-sm" name="draft"/>
            </div>
            <div class="mb-3">
                <label for="crew">Crew</label>
                <input type="number" class="form-control form-control-sm" name="crew" value="1"/>
            </div>
            <div class="mb-3">
                <label for="passengers">Passengers</label>
                <input type="number" class="form-control form-control-sm" name="passengers" value="1"/>
            </div>
            <div class="mb-3">
                <label for="fuel_type">Fuel Type</label>
                <select class="form-select form-select-sm" name="fuel_type">
                    <option value="1">Diesel</option>
                    <option value="2">Electric / Battery</option>
                    <option value="3" selected>Petrol</option>
                    <option value="4">Nature / Wind</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fuel_tank">Fuel Tank</label>
                <input type="text" class="form-control form-control-sm" name="fuel_tank"/>
            </div>
            <div class="mb-3">
                <label for="max_speed">Max Speed</label>
                <input type="text" class="form-control form-control-sm" name="max_speed"/>
            </div>
            <div class="mb-3">
                <label for="youtube_link">YouTube Link</label>
                <input type="text" class="form-control form-control-sm" name="youtube_link"/>
            </div>
            <div class="mb-3">
                <label for="fb_link">FaceBook Link</label>
                <input type="text" class="form-control form-control-sm" name="fb_link"/>
            </div>

        </div>
    </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_sold" name="is_sold">
                        <label class="form-check-label" for="is_sold">
                          Is Sold
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_approved">
                        <label class="form-check-label" for="is_approved">
                          Is Approved
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_feature">
                        <label class="form-check-label" for="is_feature">
                          Is Feature
                        </label>
                      </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="is_active">
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
                    $('#city').append(Opt);
                }
                $('#city').trigger('change');
            }
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
                $('#model').empty();
                $("#model").append('<option value="">Select</option>');
                for(var i=0; i<data.length; i++){
                    $("#model").append('<option value="'+data[i]['id']+'">'+data[i]['val']+'</option>');
                }
            }
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
