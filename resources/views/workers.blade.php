@extends('layouts/layout')
@section('content')

    <h1>Create Worker</h1>
    <form>
        <label for="workFname">First Name:</label><br>
        <input type="text" id ="fname" name ="fname"><br>
        <label for="workLname">Last Name:</label><br>
        <input type="text" id ="lname" name ="lname"><br>
        <label for="workEmail">Email:</label><br>
        <input type="email" id ="workEmail" name ="workEmail"><br><br>
        <button type="button"> Adds Worker </button>   
    </form>

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