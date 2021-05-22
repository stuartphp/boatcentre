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
        // Get the modal
        //var modal = document.getElementById("myModal");
        var modal = document.querySelector('.fancy-modal');

        // Get the button that opens the modal
        //var btn = document.getElementById("myBtn");
        var btn = document.querySelector('.fancy-modal-open');
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
@endsection
