<table class="table table-bordered" id="worker-table">
    <thead>
       <tr>
          <th>User ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Options</th>
          <th>Registrations</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($workers as $worker)
        <tr>
            <td>{{$worker->worker_id}}</td>
            <td>{{$worker->worker_first_name}}</td>
            <td>{{$worker->worker_last_name}}</td>
            <td>{{$worker->worker_email}}</td>
            <td> <a href="{{ url('/worker/edit/'.$worker->worker_id) }}"><button type="button" class="btn btn-primary" >Edit</button></a>

            <form method ="post" action="{{ url('/worker/delete/'.$worker->worker_id) }}" style="display: inline;" id="delete-form">
            {{csrf_field()}}

            <input type= "hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form> </td>
            <td><button class="btn btn-primary" onclick="window.location.href = 'workers/registrations/{{$worker->worker_id}}';">View</button></td>
        </tr>  
        @endforeach

    </tbody>
 </table>

<script>
$(document).ready( function () {
    $('#worker-table').DataTable();
} );
</script>
