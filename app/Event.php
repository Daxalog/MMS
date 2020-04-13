<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class Event extends Model
{
    //
    protected $fillable = [
        'Name', 'Date'
    ];
}
