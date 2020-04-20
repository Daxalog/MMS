@extends('layouts/layout')
@section('content')
    <h1>Registrations</h1>
    @include('forms/input_form_error')
    @include('forms/registration_input_form')
    <br/>
    <table class="table table-bordered" id="registered-table">
	    <thead>
	       <tr>
	          <th>ID</th>
	          <th>Worker Name</th>
	          <th>Worker Email</th>
	          <th>Event</th>
	          <th>Event Date</th>
	          <th>Original or Revised Registration</th>
	          <th>Registration Date</th>
	          <th>Comments</th>
	          <th>Selected</th>
	       </tr>
	    </thead>
	    <tbody>
	        @foreach ($registrations as $regis)
	        <tr>
	            <td>{{$regis->worker_event_registration_id}}</td>
	            <td>{{$regis->worker->worker_first_name}} {{$regis->worker->worker_last_name}}</td>
	            <td>{{$regis->worker->worker_email}}</td>
	            <td>{{$regis->event->event_name}}</td>
	            <td>{{$regis->event->event_date}}</td>
	            <td>{{$regis->revised_registration == 'o' ? 'Original' : 'Revised'}} Registration</td>
	            <td>{{$regis->worker_event_registration_date}}</td>
	            <td>{{$regis->worker_event_registration_comments}}</td>
	            <td>{{$regis->worker_selection_status == 's' ? 'Selected' : 'Not Selected'}}</td>
	        </tr>  
	        @endforeach
	    </tbody>
	</table>

	<script>
	$(document).ready( function () {
		$('#registered-table').DataTable();
	} );
	</script>
@endsection