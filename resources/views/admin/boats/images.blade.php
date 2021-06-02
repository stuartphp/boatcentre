@extends('layouts.app')
@section('content')
@livewire('admin.boat-images', ['id'=>$id])
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

@endsection
