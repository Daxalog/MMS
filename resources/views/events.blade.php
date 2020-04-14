@extends('layouts/layout')
@section('content')
    <h1>Events</h1>
    <table class="table table-bordered" id="table">
        <thead>
           <tr>
              <th>ID</th>
              <th>Event Name</th>
              <th>Event Date</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{$event->event_id}}</td>
                <td>{{$event->event_name}}</td>
                <td>{{$event->event_date}}</td>
            </tr>  
            @endforeach

        </tbody>
     </table>

    <script>
        
        $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
@endsection