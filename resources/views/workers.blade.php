@extends('layouts/layout')
@section('content')

    <h1>Workers</h1>
    <a href='/workers/input'>
        <button type="button" class="btn btn-primary" >Add Worker</button>
    </a>
    <br/>
    <br/>
    @include('tables/worker_table')
    
@endsection