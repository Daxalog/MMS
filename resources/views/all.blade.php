@extends('layouts/layout')
@section('content')
    <h1>All</h1>
    <table class="table table-bordered" id="table">
        <thead>
           <tr>
              <th>ID</th>
              <th>Event</th>
              <th>Event date</th>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Original or Revised Registration</th>
              <th>Marshalling Club</th>
              <th>Comments</th>
              <th>Saturday Track Day</th>
              <th>Register date</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$worker->ID}}</td>
                <td>{{$worker->FirstName}}</td>
                <td>{{$worker->LastName}}</td>
                <td>{{$worker->Email}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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