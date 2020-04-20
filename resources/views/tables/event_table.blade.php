<table class="table table-bordered" id="event-table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Organizer</th>
          <th>Date</th>
          <th>Track</th>
          <th>Workers Needed</th>
          <th>Registrations</th>
          <th>Options</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{$event->event_id}}</td>
            <td>{{$event->event_name}}</td>

            @foreach($organizers as $organizer)
                @if($organizer->event_organizer_id === $event->organizer_id_for_event)
                    <td>{{$organizer->organizer_name}}</td>
                @endif
            @endforeach
            
            <td>{{$event->event_date}}</td>
            <td><a href="/events/track/{{$event->event_track}}">{{$event->event_track}}</a></td>
            <td>{{$event->event_workers_needed}}</td>
            <td><button class="btn btn-primary" onclick="window.location.href = '/registrations/{{$event->event_id}}';">View</button></td>
            <td> <a href="{{ url('/event/edit/'.$event->event_id) }}"><button type="button" class="btn btn-primary" >Edit</button></a>
            <form method ="post" class="btn btn-primary" action="{{ url('/event/delete/'.$event->event_id) }}">
            {{csrf_field()}}
            <input type= "hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-primary">Delete</button>
            </form> </td>
        </tr>  
        @endforeach

    </tbody>
 </table>

<script>
    
    $(document).ready( function () {
    var table = $('#event-table').DataTable();
} );
</script>