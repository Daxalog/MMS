@extends('layouts/layout')
@section('content')
    <h1>Events</h1>
    <a href='/events/input'>
        <button type="button" class="btn btn-primary" href='/events/input'>Add Event</button>
    </a>
    <br />
    <br />
    <a href="/events/upcoming">View Upcoming and Past Events</a>
    <br />
    <br />
@include('tables/event_table')
@endsection