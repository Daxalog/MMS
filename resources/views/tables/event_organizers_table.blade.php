<table class="table table-bordered" id="organizer-table">
    <thead>
       <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact First</th>
          <th>Contact Last</th>
          <th>Contact Phone</th>
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
        </tr>  
        @endforeach

    </tbody>
 </table>

<script>
    
    $(document).ready( function () {
    $('#organizer-table').DataTable();
} );
</script>