@extends('layouts/layout')
@section('content')

    <h1>Workers</h1>
    <a href='/workers/input'>Add a new worker</a>
    @include('tables/worker_table')
    
@endsection