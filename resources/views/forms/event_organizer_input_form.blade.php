<form method="POST" action="/organizerAction">
@csrf
    <label>Organizer Name</label>
    <input type="text" name="organizerName"/>
    <br/>
    <label>Organizer Contact First Name</label>
    <input type="text" name="organizerFirstName"/>
    <br/>
    <label>Organizer Contact Last Name</label>
    <input type="text" name="organizerLastName"/>
    <br/>
    <label>Organizer Contact Phone number</label>
    <input type="text" name="organizerPhoneNumber"/>
    <br/>
    <button type="submit">Add</button>
</form>