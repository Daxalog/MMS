<table class="table table-bordered" id="worker-table">
    <thead>
       <tr>
          <th>User ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
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
