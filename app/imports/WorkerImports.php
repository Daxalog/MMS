<?php

namespace App\Imports;

use App\Worker;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

 class WorkerImports implements ToModel
{

     public function model(array $row){

        if ($row[0] == 'ID'){
            return null;
        }

        $workerId = $row[3];
        $workerFirst = $row[4];
        $workerLast = $row[5];
        $workerEmail = $row[6];
         
        $workerSearch = DB::table('workers')->where('worker_id', $workerId)->first();
        if($workerSearch === null){
            return new Worker([
                'worker_id' => $workerId,
                'worker_first_name' => $workerFirst,
                'worker_last_name' => $workerLast,
                'worker_email' => $workerEmail
             ]);
        }
        else {
            return null;
        }
     }
}
