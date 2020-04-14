<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventOrganizer extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'event_organizer_id', 
        'organizer_name', 
        'organizer_contact_first_name', 
        'organizer_contact_last_name', 
        'organizer_contact_phone_number',
    ];
}
