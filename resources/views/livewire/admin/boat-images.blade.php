<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5"><a href="/admin/boats">Boat Listings</a> / Images for {{ $boat->name }} ({{ $count }})</div>
                <div class="col-sm-7">
                    <form wire:submit.prevent="save">
                        <input type="file" wire:model="photos" multiple>
                        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
                        <button type="submit" class="btn btn-primary btn-sm">Upload Images</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5>Click and hold to drag</h5>
        <div class="row" wire:sortable="updateOrder">
            @foreach ($images as $img)
                <div class="col-lg-2 border ms-2 me-2 mb-3 text-center"
                    wire:sortable.item="{{ $img->id }}"
                    wire:key="image-{{ $img->id }}">
                    <img src="/images/boats/{{$img->image}}" style="height:120px; max-width:290px" class="mt-2 mb-2"/>
                    <button type="button" class="btn btn-danger btn-sm" style="font-size:16px" wire:click.prevent="deleteImage({{ $img->id }})">X</button>
                </div>
            @endforeach
        </div>

        </div>
    </div>
</div>
