@extends('layouts/layout')
@section('content')
    <h1>Workers</h1>
    @include('forms/input_form_error')
    @include('forms/worker_input_form')
    <br/>
    @include('tables/worker_table')
@endsection