<div class="ms-1 me-1">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-7">
                    <div class="card-title">Boat Manufacturers</div>
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
                            <th>Models</th>                     
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)                        
                            <tr>
                                <td>{{ $item->name }}</td> 
                                <td>
                                @foreach ($item->models as $model)
                                    {{ $model->model }},
                                @endforeach
                                </td>
                                <td class="col-1"><select class="form-select form-select-sm" wire:change="loadModal($event.target.value, {{ $item->id }})">
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
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control form-control-sm" id="name" wire:model="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn {{ $modal_btn}} btn-sm" wire:click="recordAction">{{ $modal_btn_title }}</button>
        </div>
        </div>
    </div>
    </div>
   
</div>
