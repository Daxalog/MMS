@extends('layouts/layout')
@section('content')
    <h1>Event Organizers</h1>
    @include('forms/event_organizer_input_form')
    <br/>
    @include('tables/event_organizers_table')
@endsection