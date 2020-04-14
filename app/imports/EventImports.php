<?php

namespace App\Imports;
use Carbon\Carbon;
use App\Event;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Collection;
//use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Worker;
use Illuminate\Support\Facades\DB;

 class EventImports implements ToModel
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

         $eventName = $row[1];
         $eventDate = Carbon::parse($row[2]);

         $eventSearch = DB::table('events')->where('event_name', $eventName)->first();

         if($eventSearch === null){
            return new Event([
                'event_name' => $eventName,
                'event_date' => $eventDate
             ]);
         }
        else{
            return null;
        }
         

         
     }
}