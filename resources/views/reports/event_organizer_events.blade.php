@extends('layouts/layout')
@section('content')
    <h1>Events Organized By {{ $organizer->organizer_name }}</h1>
    <br />
    <br />

    <div class="row">
	    <div class="col-md-6 card">
		    <h4>Upcoming Events</h4>
		    <table class="table">
		    	<tr>
		    		<th>Event ID</th>
		    		<th>Event Name</th>
		    		<th>Event Date</th>
		    		<th>Event Track</th>
		    	</tr>
		        @foreach($upcomingEvents as $event)
		    		<tr>
		    			<td>{{ $event->event_id }}</td>
		    			<td>{{ $event->event_name }}</td>
		    			<td>{{ $event->event_date }}</td>
		    			<td>{{ $event->event_track }}</td>
		       		</tr>
		    	@endforeach
		    </table>
		</div>

		<div class="col-md-6 card">
		    <h4>Past Events</h4>
		    <table class="table">
		    	<tr>
		    		<th>Event ID</th>
		    		<th>Event Name</th>
		    		<th>Event Date</th>
		    		<th>Event Track</th>
		    	</tr>
		        @foreach($pastEvents as $event)
		    		<tr>
		    			<td>{{ $event->event_id }}</td>
		    			<td>{{ $event->event_name }}</td>
		    			<td>{{ $event->event_date }}</td>
		    			<td>{{ $event->event_track }}</td>
		    		</tr>
		    	@endforeach
		    </table>
		</div>
	</div>
@endsection