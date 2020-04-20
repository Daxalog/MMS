@extends('layouts/layout')
@section('content')


		    <h4>Upcoming Events</h4>
		    <table class="table table-bordered">
		    	<tr>
		    		<th>Event ID</th>
		    		<th>Event Name</th>
		    		<th>Event Date</th>
		    		<th>Event Track</th>
                    <th>Workers Required<th>
                    <th>Workers Registered<th>
                    <th>Selection Email Sent?<th>
		    	</tr>
                @foreach($upcomingEvents as $event)
		    		<tr>
		    			<td>{{ $event->event_id }}</td>
		    			<td>{{ $event->event_name }}</td>
		    			<td>{{ $event->event_date }}</td>
		    			<td><a href="/events/track/{{$event->event_track}}">{{$event->event_track}}</a></td>
                        <td>{{ $event->event_workers_needed }}</td>
		       		</tr>
		    	@endforeach
		    </table>
		
@endsection