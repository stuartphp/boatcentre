<div class="ms-1 me-1">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-7">
                    <div class="card-title">Boat Categories&nbsp;<div wire:loading class="text-warning">Loading...</div></div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-1"><a href="#" wire:click.prevent="loadModal('add', 0)"><i class="fa fa-plus mt-2"></i></a></div>
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
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Is Active</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ ($item->parent_id>0) ? $cats[$item->parent_id]: '' }}</td>
                                <td>{{ ($item->is_active==0) ? 'No' : 'Yes' }}</td>
                                <td class="col-1"><select class="form-select form-select-sm" wire:change="loadModal($event.target.value, {{ $item->id }})" id="action_{{ $item->id }}" onchange="setTimeout(()=>{ $('#action_{{$item->id}}').val('');},1000)">
                                    <option value="">Select</option>
                                    <option value="edit">Edit</option>
                                    <option value="delete">Delete</option>
                                </select></td>
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
    <div class="modal" tabindex="-1" wire:ignore.self id="formModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $modal_title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="@if($action=='delete') d-none @else d-block @endif">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-sm" id="name" wire:model="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="is_active" class="form-label">is Active</label>
                    <select class="form-select form-select-sm" id="is_active" wire:model="is_active">
                        <option value="">--Select--</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            @if($action=='delete')  Are you sure you want to delete this record? @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn {{ $modal_btn}} btn-sm" wire:click="recordAction">{{ $modal_btn_title }}</button>
        </div>
        </div>
    </div>
    </div>

</div>
