@extends('layouts/layout')
@section('content')
    <h1>Editing Event Organizer</h1>
    @include('forms/input_form_error')
    @include('forms/organizer_edit_form')
    <br/>
    
@endsection