<form method="POST" action="/eventAction">
@csrf
    <label>Event Name</label>
    <input type="text" name="eventName"/>
    <br/>
    <label>Event Date</label>
    <input type="date" name="eventDate"/>
    <br/>
    <label>Event Track</label>
    <input type="text" name="eventTrack"/>
    <br/>
    <label>Organizer Id</label>
    <input type="text" name="organizerID"/>
    <br/>
    <button type="submit">Add</button>
</form>