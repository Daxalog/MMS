<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerEventRegistration extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'worker_event_registration_id', 
        'worker_event_registration_worker_id', 
        'worker_event_registration_event_id', 
        'worker_event_registration_comments', 
        'revised_registration',
        'worker_selection_status',
        'worker_event_registration_date',
        'worker_selection_communicated'
    ];
}
