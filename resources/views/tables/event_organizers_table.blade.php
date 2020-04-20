<table class="table table-bordered" id="organizer-table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact First</th>
          <th>Contact Last</th>
          <th>Contact Phone</th>
          <th>Options</th>
          <th>View Events</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($organizers as $organizer)
        <tr>
            <td>{{$organizer->event_organizer_id}}</td>
            <td>{{$organizer->organizer_name}}</td>
            <td>{{$organizer->organizer_contact_first_name}}</td>
            <td>{{$organizer->organizer_contact_last_name}}</td>
            <td>{{$organizer->organizer_contact_phone_number}}</td>
            <td> <a href="{{ url('/organizer/edit/'.$organizer->event_organizer_id) }}"><button type="button" class="btn btn-primary" >Edit</button></a>
            <form method ="post" action="{{ url('/organizer/delete/'.$organizer->event_organizer_id) }}" style="display: inline;">
            {{csrf_field()}}
            <input type= "hidden" name="_method" value="DELETE" />
            <button type="submit"  class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form> </td>
            <td><button class="btn btn-primary" onclick="window.location.href = '/organizers/{{$organizer->event_organizer_id}}';">View</button></td>
        </tr>  
        @endforeach

    </tbody>
 </table>

<script>
    
    $(document).ready( function () {
    $('#organizer-table').DataTable();
} );
</script>