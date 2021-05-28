<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5"><a href="/admin/boats">Boat Listings</a> / Additional's for {{ $boat->name }}</div>
                <div class="col-sm-7">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" placeholder="Name" wire:model="name"/>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" placeholder="Value" wire:model="value" />
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="row" wire:sortable="updateOrder">
            @foreach ($items as $item)
                <div class="col-lg-2 border ms-2 me-2 mb-3">
                    <div class="mt-2 mb-2">
                        <button type="button" class="btn-close" style="float:right" wire:click.prevent="deleteItem({{ $item->id }})"></button>
<b>{{ $item->name }}</b>: {{ $item->value }}

                    </div>

                </div>
            @endforeach
        </div>

        </div>
    </div>
</div>
