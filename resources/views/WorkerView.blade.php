@extends('layouts/layout')
@section('content')

    

    <h1>Workers</h1>
    <table class="table table-bordered" id="table">
        <thead>
           <tr>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
            <tr>
                <td>{{$worker->ID}}</td>
                <td>{{$worker->FirstName}}</td>
                <td>{{$worker->LastName}}</td>
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