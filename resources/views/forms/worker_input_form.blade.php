<form method="POST" action="/worker">
@csrf
    <label>First Name</label>
    <input type="text" name="workerFirstName"/>
    <br/>
    <label>Last Name</label>
    <input type="text" name="workerLastName"/>
    <br/>
    <label>Email</label>
    <input type="text" name="workerEmail"/>
    <br/>
    <button type="submit">Add</button>
</form>