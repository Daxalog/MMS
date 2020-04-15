<form method="POST" action="/organizer">
@csrf
    <div class="form-group">
        <label>Organizer Name</label>
        <input type="text" class="form-control" name="organizerName" required/>
    </div>

    <div class="form-group">
        <label>Organizer Contact First Name</label>
        <input type="text" class="form-control" name="organizerFirstName" required/>
    </div>

    <div class="form-group">
        <label>Organizer Contact Last Name</label>
        <input type="text" class="form-control" name="organizerLastName" required/>
    </div>

    <div class="form-group">
        <label>Organizer Contact Phone number</label>
        <input type="text" class="form-control" name="organizerPhoneNumber" required/>
    </div>

    <button class="btn btn-primary" type="submit">Add</button>
</form>