<div>
    <div class="card">
        <div class="card-header">Boat Images</div>
        <div class="card-body">
        <form wire:submit.prevent="save">
    <input type="file" wire:model="photos" multiple>

    @error('photos.*') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Save Photo</button>
</form>
            @foreach ($images as $img)
                <div class="col-sm-2"><img src="/images/boats/{{$img->image}}" style="height:90px"/></div>
            @endforeach
        </div>
    </div>
</div>
