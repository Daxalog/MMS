@extends('layouts/layout')
@section('content')
    <h1>Email Preview</h1>
    <br />
    <br />

		@include('mail/selection')

<h4>List of Recipients</h4>
<ul>
	@foreach ($recipients as $reciever)
		<li>{{ $reciever->worker_first_name }} {{ $reciever->worker_last_name }} - {{ $reciever->worker_email }}</li>
	@endforeach
</ul>

<form method="POST" action="/email/send">
@csrf
	<input class="btn btn-primary" type="submit" name="btn_submit" value="Send Emails">
</form>
@endsection