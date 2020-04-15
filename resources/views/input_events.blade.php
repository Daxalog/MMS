@extends('layouts/layout')
@section('content')
    <h1>Events</h1>
    @include('forms/event_input_form')
    <br/>
    @include('tables/event_table')
@endsection