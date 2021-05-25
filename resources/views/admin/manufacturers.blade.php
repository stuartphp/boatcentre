@extends('layouts.app')
@section('css')
    <link href="/plugins/summernote/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('content')
@livewire('admin.manufacturers')
@endsection
@section('scripts')
<script src="/plugins/summernote/summernote-lite.min.js"></script>
<script>
    var span = document.getElementsByClassName("close")[0];
    var modal = document.getElementById("formModel");
    window.addEventListener('fancymodal', event => {
      $('#summernote').summernote('code', event.detail.action);
      modal.style.display = "block";
  });
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
        ]
    });
});


    </script>
@endsection

