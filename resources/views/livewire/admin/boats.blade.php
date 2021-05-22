<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <div class="card-title">Boat Listings&nbsp;<div wire:loading class="text-warning">Loading...</div></div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-1"><a href="#" class="fancy-modal-open"><i class="fa fa-plus mt-2"></i></a></div>
                        <div class="col-7"><input type="search" class="form-control form-control-sm" wire:model="search" placeholder="Search"/></div>
                        <div class="col-4"><select  class="form-select form-select-sm" wire:model="page_size">
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="20">20</option>
                        </select></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Reference</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>New/Used</th>
                            <th>Condition</th>
                            <th>Province</th>
                            <th>Retail Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        {{ $data->links() }}
        </div>
    </div>
<!-- The Modal -->
<div id="myModal" class="fancy-modal">
    <!-- Modal content -->
    <div class="fancy-modal-content container-lg">
        <div class="fancy-modal-header">
            <div class="row">
                <div class="col-10"><p>Boat Listing</p></div>
                <div class="col-2"><span class="close">&times;</span></div>
            </div>
        </div>
        <div class="fancy-modal-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="reference">Reference</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="vin_number">VIN No. for Trailer</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="keywords">Keywords</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="cof">COF (Certificate of Fitness)</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="manufacturer">Manufacturer</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="model">Model</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="main_color">Main Color</label>
                        <input type="color" class="form-control form-control-sm" value="#ffffff"/>
                    </div>
                    <div class="mb-3">
                        <label for="new_used">New/Used</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>New</option>
                            <option value="0">Used</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="new_used">Condition</label>
                        <select class="form-select form-select-sm">
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
                        <label for="hull_construction">Hull Construction</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="province">Province</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="model">Short Description</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="description">Decription</label>
                        <textarea id="summernote"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="retail">Retail Price</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="special_price">Special Price</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="special_start">Special Start Date</label>
                        <input type="date" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="special_end">Special End Date</label>
                        <input type="date" class="form-control form-control-sm"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="weight">Weight</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="loa">LOA (Length overal)</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="beam">Beam (Greatest width of boat)</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="draft">Draft (Depth of water the boat draws)</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="crew">Crew</label>
                        <input type="number" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="passengers">Passengers</label>
                        <input type="number" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="fuel_type">Fuel Type</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Diesel</option>
                            <option value="2">Electric / Battery</option>
                            <option value="3">Petrol</option>
                            <option value="4">Nature / Wind</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fuel_tank">Fuel Tank</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="max_speed">Max Speed</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="youtube_link">YouTube Link</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>
                    <div class="mb-3">
                        <label for="fb_link">FaceBook Link</label>
                        <input type="text" class="form-control form-control-sm"/>
                    </div>

                </div>
            </div>

        </div>
        <div class="fancy-modal-footer">
            <div class="form-check mx-auto">
                <input class="form-check-input" type="checkbox" value="" id="is_approved">
                <label class="form-check-label" for="is_approved">
                  is Approved
                </label>
            </div>
            <div class="form-check mx-auto">
                <input class="form-check-input" type="checkbox" value="" id="is_active">
                <label class="form-check-label" for="is_active">
                  Is Active
                </label>
            </div>
            <div class="form-check mx-auto">
                <input class="form-check-input" type="checkbox" value="" id="is_sold">
                <label class="form-check-label" for="is_sold">
                  Is Sold
                </label>
            </div>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>&nbsp;
            <button type="button" class="btn btn-primary btn-sm">Save changes</button>
        </div>

        </div>
    </div>
  </div>
</div>
