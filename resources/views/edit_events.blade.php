@extends('layouts/layout')
@section('content')
    <h1>Editing Event</h1>
    @include('forms/input_form_error')
    @include('forms/event_edit_form')
    <br/>
    
@endsection