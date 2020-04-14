@extends('layouts/layout')
@section('content')
    <h1>Events</h1>
    <br/>
    @include('forms/event_input_form')
    <br/>
    @include('tables/event_table')
@endsection