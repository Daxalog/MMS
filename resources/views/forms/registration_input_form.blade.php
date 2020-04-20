<form method="POST" action="/registration">
@csrf
    <div class="form-group">
        <label>Worker</label>
        <select class="form-control" id="exampleFormControlSelect1" name="workerId">
            @foreach($workers as $worker)
                <option value={{$worker->worker_id}}>{{$worker->worker_first_name}} {{$worker->worker_last_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Event</label>
        <select class="form-control" id="exampleFormControlSelect1" name="eventId">
            @foreach($events as $event)
                <option value={{$event->event_id}}>{{$event->event_name}} {{$event->event_date}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Comments</label>
        <textarea name="comments" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label>Registration Type:</label><br />
        Original <input type="radio" name="type" value="o" checked/> &nbsp;&nbsp;&nbsp; Revised <input type="radio" name="type" value="r"/>
    </div>

    <div class="form-group">
        <label>Registration Date</label>
        <input type="date" name="registrationDate" class="form-control" required/>
    </div>
    
    <button class="btn btn-primary" type="submit">Add</button>
</form>