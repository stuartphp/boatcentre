@extends('layouts.app')
@section('css')
    <link href="/plugins/summernote/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('content')
    @livewire('admin.boats')
@endsection
@section('scripts')
    <script src="/plugins/summernote/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 180,
                dialogsInBody: true,
                dialogsFade: true,
                disableDragAndDrop: false,
                dialogsInBody: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    // ['insert', ['link']], //, 'picture', 'video'
                    // ['view', ['codeview']] //'fullscreen', 'codeview', 'help'
                ],
                // popover: {
                //     air: [
                //         ['color', ['color']],
                //         ['font', ['bold', 'underline', 'clear']],

                //     ]
                // }
            });
        });

function doAction(id, val){
    switch(val)
    {
        case 'edit':
            window.location.href='/admin/boats/'+id+'/edit';
            break;
        case 'images':
            window.location.href='/admin/boats/images/'+id;
            break;
        case 'additional':
            window.location.href='/admin/boats/additional/'+id;
            break;
        case 'delete':
            $('#message-title').html('Delete Boat');
            $('#message-body').html('Are you sure you want to detete this boat?<br><b>Everything will be deleted including the images!</b>')
            $('#message-footer').html('<div class="text-end"><form action="/admin/boats/'+id+'" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="DELETE"><button class="btn btn-danger btn-sm" type="submit">Delete</button></form></div>');
            $('#Message').modal('show');
            break;
    }
}
    </script>
@endsection
