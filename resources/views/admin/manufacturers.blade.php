@extends('layouts.app')
@section('css')
<style>
    .editor{
    max-width:460px;
    min-height: 400px;
    margin: 5px;
    padding: 5px;
    font-size: 1.2rem;
    box-shadow: 0 .1rem .4rem black;
    border: 1px solid black;
    overflow-y: auto;
}
</style>
@endsection
@section('content')
@livewire('admin.manufacturers')
@endsection
