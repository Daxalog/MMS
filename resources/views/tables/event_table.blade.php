<table class="table table-bordered" id="event-table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date</th>
          <th>Track</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{$event->event_id}}</td>
            <td>{{$event->event_name}}</td>
            <td>{{$event->event_date}}</td>
            <td>{{$event->event_date}}</td>
        </tr>  
        @endforeach

    </tbody>
 </table>

<script>
    
    $(document).ready( function () {
    $('#event-table').DataTable();
} );
</script>