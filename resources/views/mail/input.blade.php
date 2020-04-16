@extends('layouts/layout')
@section('content')
    <h1>Select Details for Email</h1>
    <br />
    @if(null !== \Session::get('msg'))
    	<div class="alert alert-success">	
			{{ \Session::pull('msg') }}
		</div>
	@endif
    <br />
    <form method="POST" action="/email/preview">
    @csrf
	    <p>If you want a specific message to appear on your email, enter it below:</p>
	    <textarea class="form-control" name="message"></textarea>

	    <h4>Upcoming Events</h4>
	    <table class="table">
	    	<tr>
	    		<th>Event ID</th>
	    		<th>Event Name</th>
	    		<th>Event Date</th>
	    		<th>Event Track</th>
	    		<th>Event Organizer</th>
	    		<th>Include in Email</th>
	    	</tr>
	        @foreach($upcomingEvents as $event)
	    		<tr>
	    			<td>{{ $event->event_id }}</td>
	    			<td>{{ $event->event_name }}</td>
	    			<td>{{ $event->event_date }}</td>
	    			<td>{{ $event->event_track }}</td>
	    			<td>{{ $event->eventOrganizer->organizer_name }}</td>
	    			<td><input type="checkbox" name="{{ $event->event_id }}"></td>
	    		</tr>
	    	@endforeach
	    </table>

	    <h4>Past Events</h4>
	    <table class="table">
	    	<tr>
	    		<th>Event ID</th>
	    		<th>Event Name</th>
	    		<th>Event Date</th>
	    		<th>Event Track</th>
	    		<th>Event Organizer</th>
	    		<th>Include in Email</th>
	    	</tr>
	        @foreach($pastEvents as $event)
	    		<tr>
	    			<td>{{ $event->event_id }}</td>
	    			<td>{{ $event->event_name }}</td>
	    			<td>{{ $event->event_date }}</td>
	    			<td>{{ $event->event_track }}</td>
	    			<td>{{ $event->eventOrganizer->organizer_name }}</td>
	    			<td><input type="checkbox" name="{{ $event->event_id }}"></td>
	    		</tr>
	    	@endforeach
	    </table>

	    <p>
	    	By default, the emails are only sent to the workers<br>
	    	who have yet to recieve any communication, or whose<br>
	    	selection status has changed since the last time they recieved an email.<br>
	    	If you would like to send an email to all workers relevant to the selected events,<br>
	    	Please select the checkbox below.
	    </p>
	    Send to all workers: <input type="checkbox" name="sendAll"><br><br>

		<input class="btn btn-primary" type="submit" name="btn_submit" value="Preview Email">
    </form>
@endsection