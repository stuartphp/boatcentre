@extends('layouts.app')
@section('content')
<div class="card ms-2 me-2" id="dataSheet" style="display: block;">
    <div class="card-header">
        <div class="row">
        <div class="col-md-8">Stock Items</div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-1"><a href="#" onclick="swop()"><i class="fa fa-plus"></i></a></div>
                <div class="col-md-11"></div>
            </div>
        </div>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit</th>
                <th>On Hand</th>
                <th>Retail Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->on_hand }}</td>
                    <td>{{ $item->retail_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="card-footer">
    {{ $data->links() }}
    </div>
</div>
<div class="card" id="modalForm" style="display: none;">
<div class="card-header">Create Item
<button type="button" class="btn-close" aria-label="Close"></button></div>
<div class="card-body">
<div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control form-control-sm" id="code" name="code" >
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" >
        </div>
        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" class="form-control form-control-sm" id="unit" name="unit" >
        </div>
        <div class="mb-3">
            <label for="stock_category_id" class="form-label">Category</label>
            <select class="form-control form-control-sm"  id="stock_category_id" name="stock_category_id" style="width: 100%;" >
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control form-control-sm" id="description" name="description" ></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control form-control-sm" id="image" name="image" >
        </div>
        <div class="mb-3">
            <label for="on_hand" class="form-label">On Hand</label>
            <input type="text" class="form-control form-control-sm" id="on_hand" name="on_hand" >
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Is Active</label>
            <select class="form-select form-select-sm" id="is_active" name="is_active" >
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
</div>
<div class="card-footer">
<button type="button" class="btn btn-primary btn-sm">Save</button>
</div>
</div>

@endsection
@section('scripts')
<script>
$(function(){
    $('#description').summernote({
        placeholder: 'Enter description',
        tabsize: 2,
        height: size,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
        ]
      });
});

function swop()
{
    let dataSheet = document.getElementById('dataSheet');
    let formModal = document.getElementById('modalForm');
    if(window.getComputedStyle(dataSheet).visibility === 'visible')
    {
        dataSheet.style.visibility = 'hidden';
        formModal.style.visibility = 'visible';
    }else{
        dataSheet.style.visibility = 'visible';
        formModal.style.visibility = 'hidden';
    }
}

$('#stock_category_id').select2({
    tags: true
});
</script>
@endsection
