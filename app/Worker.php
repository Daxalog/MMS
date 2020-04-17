<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public $timestamps = false;
    //
    protected $primaryKey = 'worker_id';
    protected $fillable = [
        'worker_id', 
        'worker_first_name', 
        'worker_last_name', 
        'worker_email'
    ];

    public function registrations()
    {
        return $this->hasMany(WorkerEventRegistration::class, 'worker_event_registration_worker_id', 'worker_id');
    }
}
