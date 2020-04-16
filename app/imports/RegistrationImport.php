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

        //Do not read the columns headers.
        if ($row[0] == 'ID'){
            return null;
        }

        $eventName =  $row[1];
        $eventDate = Carbon::parse($row[2]);
        //Find the event by the name and date.
        $eventSearch = DB::table('events')
                        ->where('event_name', $eventName)
                        ->where('event_date', $eventDate)
                        ->first();

        
        if($eventSearch !== null){
            //Find the worker to get his ID
            $workerSearch = DB::table('workers')
                            ->where('worker_email', $row[6])
                            ->first();

            if($workerSearch !== null){
                
                //Set the registration status
                $workerRevised = '';
                if ($row[7] == 'Original registration'){
                    $workerRevised = 'o';
                }
                else{
                    $workerRevised = 'r';
                }

                //Find any registrations that have already been entered.
                $registrationSearch = DB::table('worker_event_registrations')
                                        ->where('worker_event_registration_worker_id', $workerSearch->worker_id)
                                        ->where('worker_event_registration_event_id', $eventSearch->event_id)
                                        ->first();
                
                //If no registrations exist then enter.
                if ($registrationSearch === null){
                    
                    return new WorkerEventRegistration([
                        'worker_event_registration_worker_id' => $workerSearch->worker_id,
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

        }
        else{
            error_log('Event not found');
        }
        return null;
     }
}
