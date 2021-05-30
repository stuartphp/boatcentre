<div>
    @if ($photo)
        Photo Preview:
        <img src="{{ $photo->temporaryUrl() }}" style="height:100px">
    @endif
    <input type="file" class="form-control form-control-sm" wire:model.defer="photo">
    <div wire:loading wire:target="photo">Uploading...</div>
</div>
