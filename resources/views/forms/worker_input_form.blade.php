<form method="POST" action="/worker">
@csrf
    <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="workerFirstName"  required/>
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="workerLastName"  required/>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="workerEmail" required/>
    </div>

    <button class="btn btn-primary" type="submit">Add</button>
</form>