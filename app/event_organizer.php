<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_organizer extends Model
{
    //
    protected $fillable = [
        'organizer_name', 'organizer_contact_first_name', 'organizer_contact_last_name', 'organizer_contact_phone_number'
    ];
}
