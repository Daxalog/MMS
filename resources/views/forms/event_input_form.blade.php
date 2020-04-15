<form method="POST" action="/event">
@csrf
    <div class="form-group">
        <label>Event Name</label>
        <input type="text" name="eventName" class="form-control"  required/>
    </div>

    <div class="form-group">
        <label>Event Date</label>
        <input type="date" name="eventDate" class="form-control" required/>
    </div>

    <div class="form-group">
        <label>Event Track</label>
        <input type="text" name="eventTrack" class="form-control" required/>
    </div>

    <div class="form-group">
        <label>Organizer Id</label>
        <input type="text" name="organizerID" class="form-control" required/>
    </div>

    <button class="btn btn-primary" type="submit">Add</button>
</form>