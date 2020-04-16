<?php

namespace App\Imports;

use App\Worker;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\DB;

 class WorkerImports implements ToModel, WithHeadingRow
{

    use Importable;

     public function model(array $row){

        if ($row['id'] == 'ID'){
            return null;
        }

        $workerId = $row['event_id'];
        $workerFirst = $row['first_name'];
        $workerLast = $row['last_name'];
        $workerEmail = $row['email'];
         
        $workerSearch = DB::table('workers')->where('worker_email', $workerEmail)->first();
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
