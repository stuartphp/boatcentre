@extends('layouts.app')
@section('content')
<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <div class="card-title">Boat Listings&nbsp;</div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-1"><a href="/admin/boats/create" ><i class="fa fa-plus mt-2"></i></a></div>
                        <div class="col-7"><input type="search" class="form-control form-control-sm" placeholder="Search"/></div>
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
                            <th>Category</th>
                            <th>New/Used</th>
                            <th>Condition</th>
                            <th>Province</th>
                            <th>Retail Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
        {{ $data->links() }}
        </div>
    </div>


@endsection
