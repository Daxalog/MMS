@extends('layouts/layout')
@section('content')
    <h1>Registration Summary</h1>
    <br />
    <br />
    <table class="table table-bordered">
	    <thead>
	       <tr>
	          <th>Worker Name</th>
	          <th>Worker Email</th>
	          <th>Registrations</th>
	          <th>Selections</th>
	          <th>Rate of Selections</th>
	       </tr>
	    </thead>
	    <tbody>
	        @foreach ($counts as $count)
	        <tr>
	            <td>{{$count[0]}} {{$count[1]}}</td>
	            <td>{{$count[2]}}</td>
	            <td>{{$count[3]}}</td>
	            <td>{{$count[4]}}</td>
	            @if($count[3] == 0)
	            	<td>0%</td>
	            @else
	            	<td>{{round(($count[4]/$count[3])*100)}}%</td>
	            @endif
	        </tr>  
	        @endforeach
	    </tbody>
	</table>
@endsection