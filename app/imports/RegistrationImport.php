<?php

namespace App\Imports;

use App\WorkerEventRegistration;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

 class RegistrationImport implements ToModel
{
    use Importable;

     public function model(array $row){

        if ($row[0] == 'ID'){
            return null;
        }


        $eventName =  $row[1];
        $eventDate = Carbon::parse($row[2]);
        $workerEmail = $row[6];

        $eventSearch = DB::table('events')
                        ->where('event_name', $eventName)
                        ->where('event_date', $eventDate)
                        ->first();

        if($eventSearch !== null){
            //error_log('found');
            //error_log($eventSearch->event_id);
            $workerRevised = '';
            if ($row[7] == 'Original registration'){
                $workerRevised = 'o';
            }
            else{
                $workerRevised = 'r';
            }

            $registrationSearch = DB::table('worker_event_registrations')
                                    ->where('worker_event_registration_worker_id', $row[3])
                                    ->where('worker_event_registration_event_id', $eventSearch->event_id)
                                    ->first();
            
            if ($registrationSearch === null){
                return new WorkerEventRegistration([
                    //'worker_event_registration_id' => 1,
                    'worker_event_registration_worker_id' => $row[3],
                    'worker_event_registration_event_id' => $eventSearch->event_id,
                    'worker_event_registration_comments' => $row[9],
                    'revised_registration' => $workerRevised,
                    'worker_event_registration_date' => Carbon::parse($row[11]),
                    'worker_selection_communicated' => false
                ]);
            }
            else{
                error_log('Worker Registration Already Exists');
            }

        }
        else{
            error_log('Event not found');
        }
        return null;
     }
}
