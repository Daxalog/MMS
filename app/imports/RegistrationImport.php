<?php

namespace App\Imports;

use App\WorkerEventRegistration;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

 class RegistrationImport implements ToModel, WithHeadingRow
{
     public function model(array $row){
        //dd($row);
        //Do not read the columns headers.
        if ($row['id'] == 'ID'){
            return null;
        }

        $eventName =  $row['event'];
        $eventDate = Carbon::parse($row['event_date']);
        //Find the event by the name and date.
        $eventSearch = DB::table('events')
                        ->where('event_name', $eventName)
                        ->where('event_date', $eventDate)
                        ->first();

        
        if($eventSearch !== null){
            //Find the worker to get his ID
            $workerSearch = DB::table('workers')
                            ->where('worker_email', $row['email'])
                            ->first();

            if($workerSearch !== null){
                
                //Set the registration status
                $workerRevised = '';
                if ($row['original_or_revised_registration'] == 'Original registration'){
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
                        'worker_event_registration_comments' => $row['comments'],
                        'revised_registration' => $workerRevised,
                        'worker_event_registration_date' => Carbon::parse($row['register_date']),
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
