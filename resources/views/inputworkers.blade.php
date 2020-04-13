@extends('layouts/layout')
@section('content')
    <h1>Workers Input</h1>
    <br/>
    <form>
        <label>First Name</label>
        <input type="text"/>
        <br/>
        <label>Last Name</label>
        <input type="text"/>
        <br/>
        <label>Email</label>
        <input type="text"/>
        <br/>
        <button>Add</button>
    </form>
    <br/>
    <table class="table table-bordered" id="table">
        <thead>
           <tr>
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
            <tr>
                <td>{{$worker->ID}}</td>
                <td>{{$worker->FirstName}}</td>
                <td>{{$worker->LastName}}</td>
                <td>{{$worker->Email}}</td>
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