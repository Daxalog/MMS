<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\EventOrganizer;

class EventOrganizersController extends Controller
{
    //
    public function show(){
        $organizers = DB::table('event_organizers')->get();
        return view('organizers', ['organizers'=> $organizers]);
    }

    public function showInput() {
        $workers = DB::table('event_organizers')->get();
        return view('input_event_organizer', ['organizers'=> $workers]);
    }

    public function storeOrganizer(){

        $organizer = new EventOrganizer();

        //$organizer->event_organizer_id = request('eventOrganizerID');
        $organizer->organizer_name = request('organizerName');
        $organizer->organizer_contact_first_name = request('organizerFirstName');
        $organizer->organizer_contact_last_name = request('organizerLastName');
        $organizer->organizer_contact_phone_number = request('organizerPhoneNumber');
        
        $organizer->save();
        return redirect('/organizers/input');
    }
}
