<?php

namespace App\Imports;

use App\Event;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Collection;
//use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Worker;
use Illuminate\Support\Facades\DB;

 class WorkerImports implements ToModel
{
    /**
     * @param array $row
     *
     * @return Event|null
     */

     public function model(array $row){

        if ($row[0] == 'ID'){
            return null;
        }

         $workerId = $row[3];
         $workerFirst = $row[4];
         $workerLast = $row[5];
         $workerEmail = $row[6];
         
         $workerSearch = DB::table('workers')->where('ID', $workerId)->first();
        if($workerSearch === null){
            return new Worker([
                'ID' => $workerId,
                'FirstName' => $workerFirst,
                'LastName' => $workerLast,
                'Email' => $workerEmail
             ]);
        }
        else {
            return null;
        }

        

         

     }
}
