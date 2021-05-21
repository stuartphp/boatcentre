@extends('layouts.app')
@section('content')
@livewire('admin.dealers.info', ['id'=>$id])
@endsection