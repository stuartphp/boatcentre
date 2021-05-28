<div class="ms-3 me-3">
    <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">Users / List &nbsp; <div wire:loading>Processing...</div></div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-1">
                    @if (auth()->user()->profile < 3)
                        <a href="#" wire:click.prevent="modalAction('add', 0)"><i class="fa fa-plus mt-2"></i></a>
                    @endif

                    </div>
                        <div class="col-7"><input type="search" class="form-control form-control-sm" wire:model="search" placeholder="Search" /></div>
                        <div class="col-4"><select class="form-select form-select-sm" wire:model="page_size">
                                <option value="12">12</option>
                                <option value="16">16</option>
                                <option value="20">20</option>
                            </select></div>
                </div>
                {{-- <a href="#" title="Invite a user" data-bs-toggle="modal" data-bs-target="#frmInvitation" ><i class="fa fa-envelope" style="font-size:1.2rem"></i></a> --}}

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Email Verified</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->email_verified_at }}</td>
                    <td class="col-lg-1"><select class="form-select form-select-sm"
                        wire:change="modalAction($event.target.value, {{ $item->id }})"
                        id="action_{{ $item->id }}"
                        onchange="setTimeout(()=>{ $('#action_{{$item->id}}').val('');},1000)">
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

<div class="modal" tabindex="-1" id="formModal" wire:ignore.self>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $modal['title'] }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control form-control-sm" id="name" wire:model="model.name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm" id="email" wire:model="model.email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control form-control-sm" id="password" wire:model="model.password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm" wire:click="modalAction('{{ $modal['action'] }}', {{ $model['id'] }})" data-bs-dismiss="modal" aria-label="Close">{{ $modal['btn_title'] }}</button>
      </div>
    </div>
</div>

</div>


</div>
