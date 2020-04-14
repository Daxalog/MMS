<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class Event extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'organizer_id_for_event',
        'event_name',
        'event_date',
        'event_track'
    ];
}
