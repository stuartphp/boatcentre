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
    }
}
    </script>
@endsection
