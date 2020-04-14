<!DOCTYPE html>
<html>
<head>
	<title>Please Confirm</title>
</head>
<body>
	<p>
		{{ $recipient->worker_last_name }},<b />
		Thank you for your applications. The table below shows the names of the marshals
		that we have selected to work on each of the days listed. If your name does not appear
		in the table, we're sorry but it means we had more marshals apply than are needed
		by the track day organizers.<b /><b />
		{{ $message }}
	</p>

	<table>
		<tr>
			<td></td>
			@foreach ($events as $event)
				<td>{{ $event->event_name }}</td>
			@endforeach
		</tr>
		<tr>
			<td></td>
			@foreach ($events as $event)
				<td>{{ $event->event_date }}</td>
			@endforeach
		</tr>
		<tr>
			<td># Workers Needed -></td>
			@foreach ($events as $event)
				<td>{{ $event->event_needed_workers }}</td>
			@endforeach
		</tr>
		<tr>
			<td>Track -></td>
			@foreach ($events as $event)
				<td>{{ $event->event_track }}</td>
			@endforeach
		</tr>
		<tr>
			<td>Worker Name</td>
		</tr>
		@foreach ($workers as $worker)
			<tr>
				<td>{{ $worker->worker_first_name }}, {{ $worker->worker_last_name }}</td>
				@foreach ($events as $event)
					<td>
						@foreach ($selections as $selection)
							@if ($selection->worker_event_registration_worker_id == $worker->worker_id && $selection->worker_event_registration_event_id == $event->event_id && $selection->worker_selection_status == 's')
								X
							@endif
						@endforeach
					</td>
				@endforeach
			</tr>
		@endforeach
	</table>
</body>
</html>