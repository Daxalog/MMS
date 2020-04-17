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
        <label>Workers Needed</label>
        <input type="text" name="'event_workers_needed" class="form-control" required/>
    </div>

    <div class="form-group">
        <label>Organizer Id</label>
        <!--<input type="text" name="organizerID" class="form-control" required/> -->

        <select class="form-control" id="exampleFormControlSelect1" name="organizerID">
            @foreach($organizers as $organizer)
                <option value={{$organizer->event_organizer_id}}>{{$organizer->organizer_name}}</option>
            @endforeach
        </select>
    </div>
    
    <button class="btn btn-primary" type="submit">Add</button>
</form>