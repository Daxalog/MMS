<table class="table table-bordered" id="organizer-table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact First</th>
          <th>Contact Last</th>
          <th>Contact Phone</th>
          <th>Options</th>
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
            <form method ="post" class="btn btn-primary" action="{{ url('/organizer/delete/'.$organizer->event_organizer_id) }}">
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
    $('#organizer-table').DataTable();
} );
</script>