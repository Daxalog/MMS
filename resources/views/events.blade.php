@extends('layouts/layout')
@section('content')
    <h1>Create Event</h1>
    <form>
        <label for="eventName">Event Name:</label><br>
        <input type="text" id ="eventName" name ="eventName"><br>
        <label for="trackDate">Track Date:</label><br>
        <input type="date" id ="trackdate" name ="trackdate"><br>
        <label for="eventTrack"> Event Track: </label><br>
        <input type="text" id ="eventTrack" name ="eventTrack"><br><br>
        <button type="button"> Add New Event </button>   
    </form>

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
                <td>{{$event->ID}}</td>
                <td>{{$event->Name}}</td>
                <td>{{$event->Date}}</td>
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