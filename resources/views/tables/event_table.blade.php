<table class="table table-bordered" id="event-table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Date</th>
          <th>Track</th>
          <th>Workers Needed</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{$event->event_id}}</td>
            <td>{{$event->event_name}}</td>
            <td>{{$event->event_date}}</td>
            <td>{{$event->event_track}}</td>
            <td>{{$event->event_workers_needed}}</td>
        </tr>  
        @endforeach

    </tbody>
 </table>

<script>
    
    $(document).ready( function () {

    var table = $('#event-table').DataTable();
    $('#event-table').on('click', 'tr', function () {
        var data = table.row( this ).data();
        alert( 'You clicked on '+data[1]+'\'s row' );
    } );
} );
</script>