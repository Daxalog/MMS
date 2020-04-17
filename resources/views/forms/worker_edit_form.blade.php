<form method="POST" action="{{action('WorkerController@updateWorker', $id)}}">
@csrf
    <input type="hidden" name="_method" value="PATCH" />

    <div class="form-group">
        <label>First Name</label>
        <input type="text" value="{{$worker->worker_first_name}}" class="form-control" name="workerFirstName"  required/>
    </div>

    <div class="form-group">
        <label>Last Name</label>
        <input type="text" value="{{$worker->worker_last_name}}" class="form-control" name="workerLastName"  required/>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" value="{{$worker->worker_email}}" class="form-control" name="workerEmail" required/>
    </div>

    <button class="btn btn-primary" type="submit">Edit</button>
</form>
