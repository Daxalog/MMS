<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'worker_id', 
        'worker_first_name', 
        'worker_last_name', 
        'worker_email'
    ];
    protected $primaryKey = 'worker_id';
}
