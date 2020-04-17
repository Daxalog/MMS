<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class Event extends Model
{
    public $timestamps = false;
    //
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'organizer_id_for_event',
        'event_name',
        'event_date',
        'event_track',
        'event_workers_needed'
    ];

    public function eventOrganizer()
    {
        return $this->belongsTo(EventOrganizer::class, 'organizer_id_for_event', 'event_organizer_id');
    }

    public function registrations()
    {
        return $this->hasMany(WorkerEventRegistration::class, 'worker_event_registration_event_id', 'event_id');
    }
}
