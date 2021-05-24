<div>
    <div class="mb-3">
        <label for="manufacturer">Manufacturer</label>
        <select class="form-select form-select-sm" name="manufacturer" wire:model="manufacturer" >
            <option value="{{ $man->id }}">{{ $man->name }}</option>
            @foreach ($manufacturers as $man )
            <option value="{{ $man->id }}">{{ $man->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="model">Model</label>
        <select class="form-select form-select-sm" wire:model="model">
            @if ($models->count() ==  0)
                <option value="">-- select manufacturere first --</option>
            @else
              {{-- @foreach($models ad $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
               @endforeach --}}
            @endif
        </select>
    </div>
</div>
