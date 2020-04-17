@extends('layouts/layout')
@section('content')
    <h1>Editing Worker</h1>
    @include('forms/input_form_error')
    @include('forms/worker_edit_form')
    <br/>
    
@endsection