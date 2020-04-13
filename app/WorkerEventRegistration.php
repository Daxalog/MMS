<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerEventRegistration extends Model
{
    //
    protected $fillable = [
        'ID', 'WorkerID', 'EventID', 'Comments', 'RevisedRegistration','Date'
    ];
}
