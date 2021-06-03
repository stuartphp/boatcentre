<div class="ms-1 me-1">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-7">
                    <div class="card-title">Dealers&nbsp;<div wire:loading class="text-warning">Loading Record...</div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-1"><a href="#" wire:click.prevent="loadModal('add', 0)"><i class="fa fa-plus mt-2"></i></a></div>
                        <div class="col-7"><input type="search" class="form-control form-control-sm" wire:model="search" placeholder="Search" /></div>
                        <div class="col-4"><select class="form-select form-select-sm" wire:model="page_size">
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
                            <th>Ac No.</th>
                            <th>Name</th>
                            <th>contact_person</th>
                            <th>mobile</th>
                            <th>office_number</th>
                            <th>website</th>
                            <th>email</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr @if($item->is_active==0) style="color:#ff0000" @endif>
                            <td>{{ $item->account_number }} </td>
                            <td>{{ ($item->trading_name>'') ? $item->trading_name : $item->registered_name }} </td>
                            <td>{{ $item->contact_person }} </td>
                            <td>{{ $item->mobile }} </td>
                            <td>{{ $item->office_number }} </td>
                            <td>{{ $item->website }} </td>
                            <td>{{ $item->email }} </td>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $modal_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="@if($action=='delete') d-none @else d-block @endif">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control form-control-sm" id="account_number" wire:model="account_number" @if($action=='add' ) disabled @endif>
                                    @error('account_number') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="registered_name" class="form-label">Registered Name</label>
                                    <input type="text" class="form-control form-control-sm" id="registered_name" wire:model="registered_name">
                                    @error('registered_name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="trading_name" class="form-label">Trading Name</label>
                                    <input type="text" class="form-control form-control-sm" id="trading_name" wire:model="trading_name">
                                    @error('trading_name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="vat_number" class="form-label">VAT Number</label>
                                    <input type="text" class="form-control form-control-sm" id="vat_number" wire:model="vat_number">
                                    @error('vat_number') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="physical_address" class="form-label">Physical Address</label>
                                    <textarea class="form-control form-control-sm" id="physical_address" rows="4" wire:model="physical_address"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text" class="form-control form-control-sm" id="contact_person" wire:model="contact_person">
                                    @error('contact_person') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control form-control-sm" id="mobile" wire:model="mobile">
                                    @error('mobile') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="office_number" class="form-label">office_number</label>
                                    <input type="text" class="form-control form-control-sm" id="office_number" wire:model="office_number">
                                    @error('office_number') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="website" class="form-label">website</label>
                                    <input type="text" class="form-control form-control-sm" id="website" wire:model="website">
                                    @error('website') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" wire:model="email" required>
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
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
                        </div>
                        @if ($logo)
                        <img src="/images/logos/{{$logo}}"/>
                        @endif
                    </div>
                    @if($action=='delete') Are you sure you want to delete this record? @endif
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-9">
                            <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <!-- File Input -->
                                <form wire:submit.prevent="save">
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-7">
                                        <input type="file" wire:model="photo">
                                    </div>
                                    <div class="col-sm-3">
                                    <button type="submit">Upload</button>
                                    </div>
                                </div>
                                </form>

                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 text-end"><button type="button" class="btn {{ $modal_btn}} btn-sm" wire:click="recordAction">{{ $modal_btn_title }}</button></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
