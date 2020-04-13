<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
    protected $fillable = [
        'ID', 'FirstName', 'LastName', 'Email'
    ];
}
