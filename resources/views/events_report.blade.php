@extends('layouts/layout')
@section('content')
	<br />
	<br />
    <div class="row">
	    <div class="col-md-6 card">
		    <h4>Upcoming Events</h4>
		    <table class="table table-bordered" id="upcoming-events">
				<thead>
					<tr>
						<th>Event ID</th>
						<th>Event Name</th>
						<th>Event Date</th>
						<th>Event Track</th>
						<th>Event Organizer</th>
					</tr>
				</thead>

				<tbody>
		        @foreach($upcomingEvents as $event)
		    		<tr>
		    			<td>{{ $event->event_id }}</td>
		    			<td>{{ $event->event_name }}</td>
		    			<td>{{ $event->event_date }}</td>
		    			<td><a href="/events/{{$event->event_track}}">{{$event->event_track}}</a></td>
		    			<td>{{ $event->eventOrganizer->organizer_name }}</td>
		       		</tr>
				@endforeach
				</tbody>
		    </table>
		</div>

		<div class="col-md-6 card">
		    <h4>Past Events</h4>
		    <table class="table table-bordered" id="past-events">
				<thead>
		    	<tr>
		    		<th>Event ID</th>
		    		<th>Event Name</th>
		    		<th>Event Date</th>
		    		<th>Event Track</th>
		    		<th>Event Organizer</th>
				</tr>
				</thead>
				@foreach($pastEvents as $event)
				<tbody>
		    		<tr>
		    			<td>{{ $event->event_id }}</td>
		    			<td>{{ $event->event_name }}</td>
		    			<td>{{ $event->event_date }}</td>
		    			<td><a href="/events/{{$event->event_track}}">{{$event->event_track}}</a></td>
		    			<td>{{ $event->eventOrganizer->organizer_name }}</td>
					</tr>
				</tbody>
		    	@endforeach
		    </table>
		</div>
	</div>
	<script>
	$(document).ready( function () {
		$('#upcoming-events').DataTable();
		$('#past-events').DataTable();
	} );

	</script>
@endsection