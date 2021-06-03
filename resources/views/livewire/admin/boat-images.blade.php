<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5"><a href="/admin/boats">Boat Listings</a> / Images for {{ $boat->name }} ({{ $count }})</div>
                <div class="col-sm-7">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="input-group">
                                <input type="file" class="form-control" wire:model="photos" multiple aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Upload Images</button>
                              </div>@error('photos.*') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5>Click and hold to drag. All images will be resized and turned horizontally to maintain uniformity on this site. Any Image above 3MB will not be uploaded.</h5>
        <div class="row">
        <div class="col-10">
            <div class="row" wire:sortable="updateOrder">
            @foreach ($images as $img)
                <div class="col-lg-2 border ms-2 me-2 mb-3 text-center"
                    wire:sortable.item="{{ $img->id }}"
                    wire:key="image-{{ $img->id }}">
                    <img src="/images/boats/{{$img->image}}" style="height:120px; max-width:290px" class="mt-2 mb-2"/>
                </div>
            @endforeach
            </div>
        </div>
        <div class="col-2">
            @foreach ($images as $img)
                <div class="col-12 text-center">
                    <img src="/images/boats/{{$img->image}}" style="max-width:100px" class="mt-2 mb-2"/>
                    <button type="button" class="btn btn-danger btn-sm" style="font-size:16px" wire:click="deleteImage({{ $img->id }})">X</button>
                </div>
            @endforeach
            </div>
        </div>

        </div>
    </div>
</div>
