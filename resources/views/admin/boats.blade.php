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

        var modal = document.querySelector('.fancy-modal');
        var btn = document.querySelector('.fancy-modal-open');
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
@endsection
