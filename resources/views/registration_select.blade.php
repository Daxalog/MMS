@extends('layouts/layout')
@section('content')
    <h1>Registrations for {{ $event->event_name }}</h1>
    <br />
    @if(isset($msg))
    	<div class="alert alert-success">	
			{{ $msg }}
		</div>
	@endif
    <br />
    <form method="POST" action="/registrations/{{$event->event_id}}">
    @csrf
	    <table class="table table-bordered">
		    <thead>
		       <tr>
		          <th>ID</th>
		          <th>Worker Name</th>
		          <th>Worker Email</th>
		          <th>Original or Revised Registration</th>
		          <th>Registration Date</th>
		          <th>Selected</th>
		       </tr>
		    </thead>
		    <tbody>
		        @foreach ($registrations as $regis)
		        <tr>
		            <td>{{$regis->worker_event_registration_id}}</td>
		            <td>{{$regis->worker->worker_first_name}} {{$regis->worker->worker_last_name}}</td>
		            <td>{{$regis->worker->worker_email}}</td>
		            <td>{{$regis->revised_registration == 'o' ? 'Original' : 'Revised'}} Registration</td>
		            <td>{{$regis->worker_event_registration_date}}</td>
		            <td><input type="checkbox" name="{{ $regis->worker_event_registration_id }}" {{$regis->worker_selection_status == 's' ? 'checked' : ''}}></td>
		        </tr>  
		        @endforeach
		    </tbody>
		</table>

		<input class="btn btn-primary" type="submit" name="btn_submit" value="Apply Selections">
    </form>
@endsection