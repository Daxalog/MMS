<form method="POST" action="{{action('EventOrganizerController@updateOrganizer', $id)}}">
@csrf
    <input type="hidden" name="_method" value="PATCH" />
    <div class="form-group">
        <label>Organizer Name</label>
        <input type="text" value="{{$organizer->organizer_name}}" class="form-control" name="organizerName" required/>
    </div>

    <div class="form-group">
        <label>Organizer Contact First Name</label>
        <input type="text" value="{{$organizer->organizer_contact_first_name}}" class="form-control" name="organizerFirstName" required/>
    </div>

    <div class="form-group">
        <label>Organizer Contact Last Name</label>
        <input type="text" value="{{$organizer->organizer_contact_last_name}}" class="form-control" name="organizerLastName" required/>
    </div>

    <div class="form-group">
        <label>Organizer Contact Phone number</label>
        <input type="text" value="{{$organizer->organizer_contact_phone_number}}" class="form-control" name="organizerPhoneNumber" required/>
    </div>

    <button class="btn btn-primary" type="submit">Edit</button>
</form>