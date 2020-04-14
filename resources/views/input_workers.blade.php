@extends('layouts/layout')
@section('content')
    <h1>Workers Input</h1>
    <br/>
    @include('forms/worker_input_form')
    <br/>
    @include('tables/worker_table')
@endsection