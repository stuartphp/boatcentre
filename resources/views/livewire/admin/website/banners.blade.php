<div>
    <div class="card">
        <div class="card-header">
        <div class="row">
            <div class="col-md-8">
               <div class="header-titlte">Banners</div>
            </div>
            <div class="col-md-4">
            <div class="row">
                <div class="col-1"><a href="#" wire:click.prevent="loadModal('add', 0)"><i class="fa fa-plus"></i></a></div>
                <div class="col-7"><input type="text" class="form-control form-control-sm" wire:model="search"/></div>
                <div class="col-4">
                    <select  class="form-select form-select-sm" wire:model="page_size">
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="20">20</option>
                    </select>
                </div>
            </div>

            </div>
        </div>

        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Slogan</th>
                <th>Title</th>
                <th>Link</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td><img src="/images/{{ $item->image  }}" style="height:75px"/></td>
                    <td>{{ $item->slogan }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->link }}</td>
                    <td>{{ ($item->is_active==1) ? 'Yes' : 'No' }}</td>
                    <td class="col-1"><select class="form-select form-select-sm" wire:change="loadModal($event.target.value, {{ $item->id }})">
                        <option value="">Select</option>
                        <option value="edit">Edit</option>
                        <option value="delete">Delete</option>
                    </select></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Found {{ $data->total() }} showing {{ $data->perPage() }}</td>
                <td colspan="5">
                    {{ $data->links() }}
                </td>
            </tr>
        </tfoot>
        </table>
        </div>

        </div>
    </div>
<div class="modal" tabindex="-1" id="formModal" wire:ignore.self>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $modal_title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if ($current_image)
          <img src="/images/{{ $current_image }}" style="width:460px"/>
        @endif
        <div class="mb-3">
            <label for="formFile" class="form-label">@if($current_image>'') Change Image @else Select Image @endif</label>
            <input class="form-control" type="file" id="formFile" wire:model="image">
        </div>
        <div wire:loading wire:target="image">Uploading...</div>
        <div class="mb-3">
            <label for="slogan" class="form-label">Slogan</label>
            <input type="text" class="form-control" id="slogan" wire:model="slogan">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" id="title" wire:model="title">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">link</label>
            <input type="text" class="form-control" id="link" wire:model="link">
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active</label>
            <select class="form-select" wire:model="is_active">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" wire:click="recordAction">{{ $modal_btn }}</button>
      </div>
    </div>
  </div>
</div>
</div>
