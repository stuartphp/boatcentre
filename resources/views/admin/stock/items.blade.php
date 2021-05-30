@extends('layouts.app')
@section('content')
<div class="card ms-2 me-2" id="dataSheet">
    <div class="card-header">
        <div class="row">
        <div class="col-md-8">Stock Items</div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-1"><a href="#" data-bs-toggle="modal" data-bs-target="#formModal" id="add"><i class="fa fa-plus"></i></a></div>
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
                    <th class="col-1">Action</th>
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
                        <td class="text-end">{{ number_format($item->retail_price, 2) }}</td>
                        <td><select class="form-select form-select-sm" id="action_{{ $item->id }}" onchange="doAction(this.value, {{ $item->id }})">
                            <option value="">Select</option>
                            <option value="edit">Edit</option>
                            <option value="delete">Delete</option>
                        </select></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>

    <div class="card-footer">
    {{ $data->links() }}
    </div>
</div>
<form method="post" action="{{ route('items.store') }}" class="ms-2 me-2" id="formElement" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="action" value="add">
<div class="modal" tabindex="-1" id="formModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control form-control-sm" id="code" name="code" >
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control form-control-sm" id="description" name="description" ></textarea>
                    </div>
                </div>
                <div class="col-md-6">
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
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control form-control-sm" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="retail_price" class="form-label">Retail Price</label>
                        <input type="text" class="form-control form-control-sm" id="retail_price" name="retail_price" >
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="on_hand" class="form-label">On Hand</label>
                            <input type="text" class="form-control form-control-sm" id="on_hand" name="on_hand" >
                        </div>
                        <div class="col-md-6">
                            <label for="is_active" class="form-label">Is Active</label>
                            <select class="form-select form-select-sm" id="is_active" name="is_active" >
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
@section('scripts')
<script>
window.addEventListener('image', event => {
        $('#image').val(event.detail);
});
$(function(){
    $('#description').summernote({
        placeholder: 'Enter description',
        tabsize: 2,
        height: 122,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
        ]
      });
});

$('#stock_category_id').select2({
    dropdownParent: $('#formModal'),
    placeholder: "Create if it doesn't exist",
    tags: true,
    ajax: {
        url: '/admin/search/categories',
        method: 'POST',
        data: function (params) {
            var query = {
                search: params.term,
            };
            // Query parameters will be ?search=[term]&type=public
            return query;
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
    }
});
$('#add').on('click', function(e){
    $('#formElement').attr('action', '/admin/stock/items');
    $('.modal-title').html('Add New Record');
    $('#image').val('');
    $('#_method').remove();
});

function updCat(id)
{
    $.ajax({
        url: '/admin/search/categories/'+id,
        method: 'POST',
        dataType: 'JSON',
        success: function(items)
        {
            $.each(items, function (i, item) {
                $('#stock_category_id').append($('<option>', {
                    value: item.id,
                    text : item.text
                }));
            });
        }
    });
}
function doAction(val, id)
{
    switch(val)
    {
        case 'edit':
            $('#formElement').attr('action', '/admin/stock/items/'+id);
            $('#formElement').append('<input type="hidden" id="_method" name="_method" value="PUT" />');
            $('.modal-title').html('Edit Record');
            $.ajax({
                url: '/admin/stock/items/'+id+'/edit',
                dataType: 'JSON',
                method: 'GET',
                success: function(response){
                    $('#code').val(response.data.code);
                    $('#name').val(response.data.name);
                    $('#unit').val(response.data.unit);
                    updCat(response.data.stock_category_id);
                    $('#stock_category_id').val(response.data.stock_category_id);
                    $('#description').summernote('code', response.data.description);
                    $('#retail_price').val(response.data.retail_price);
                    if(response.data.image > ''){
                        $('#image').after('<img src="/images/stock/'+response.data.image+'" style="height:100px"/>');
                    }
                    $('#on_hand').val(response.data.on_hand);
                    $('#is_active').val(response.data.is_active);
                }
            }).done(function(){

                $('#formModal').modal('show');
            });
            break;
        case 'delete':

            break;
    }
    $('#action_'+id).val('');
}
</script>
@endsection
