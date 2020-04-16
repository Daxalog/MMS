<!DOCTYPE html>
<html>
<head>
	<title>Please Confirm</title>
</head>
<body>
	<p>
		{{ $recipient->worker_first_name }},<br />
		Thank you for your applications. The table below shows the names of the marshals
		that we have selected to work on each of the days listed. If your name does not appear
		in the table, we're sorry but it means we had more marshals apply than are needed
		by the track day organizers.<br /><br />
		{{ $bodyMessage }}
	</p>

	<table border="1">
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
			<td align="right"># Workers Needed -></td>
			@foreach ($events as $event)
				<td>{{ $event->event_needed_workers }}</td>
			@endforeach
		</tr>
		<tr>
			<td align="right">Track -></td>
			@foreach ($events as $event)
				<td>{{ $event->event_track }}</td>
			@endforeach
		</tr>
		<tr>
			<td><b>Worker Name</b></td>
		</tr>
		@foreach ($workers as $worker)
			<tr>
				<td align="right">{{ $worker->worker_last_name }}, {{ $worker->worker_first_name }}</td>
				@foreach ($events as $event)
					<td align="center">
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