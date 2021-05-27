<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <div class="card-title">Boat Listings&nbsp;<div wire:loading class="text-warning">Loading...</div></div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-1"><a href="/admin/boats/create"><i class="fa fa-plus mt-2"></i></a></div>
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
                            <th>Model</th>
                            <th>New/Used</th>
                            <th>Condition</th>
                            <th>Province</th>
                            <th>Retail Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr @if(auth()->user()->dealer_id != $item->dealer_id) class="table-info" @endif>
                            <td>{{ $item->reference }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->manufacturere_name }} / {{ $item->model_name }}</td>
                            <td>{{ ($item->new_used==0) ? 'Used' : 'New' }}</td>
                            <td>{{ __('global.condition.'.$item->condition) }}</td>
                            <td>{{ strtoupper($item->province) }} / {{ $item->city }}</td>
                            <td class="text-end">{{ number_format($item->retail_price,2) }}</td>
                            <td><select class="form-select form-select-sm" onchange="doAction({{ $item->id }}, this.value)">
                                <option value="">Select</option>
                                <option value="edit">Edit</option>
                                <option value="images">Images</option>
                                <option value="delete">Delete</option>
                            </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        {{ $data->links() }}
        </div>
    </div>
</div>
