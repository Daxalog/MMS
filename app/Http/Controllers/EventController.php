<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;

class EventController extends Controller
{

    public function show() {
        $organizers = DB::table('event_organizers')->get();
        $events = DB::table('events')->get();
        return view('events', ['events'=> $events, 'organizers' => $organizers]);
    }
    
    public function showInput() {
        $events = DB::table('events')->get();

        $organizers = DB::table('event_organizers')->get();
        return view('input_events', ['events'=> $events, 'organizers' => $organizers]);
    }

    public function storeEvent(){

        $event = new event();

        $event->event_name = request('eventName');
        $event->event_date = request('eventDate');
        $event->event_track = request('eventTrack');
        $event->organizer_id_for_event = request('organizerID');

        $event->save();
        return redirect('/events/input');
    }
}
