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

    public function showUpcoming()
    {
        $upcomingEvents = \App\Event::where('event_date', '>', DB::raw('NOW()'))->orderBy('event_date', 'asc')->get();
        $pastEvents = \App\Event::where('event_date', '<=', DB::raw('NOW()'))->orderBy('event_date', 'desc')->get();

        return view('events_report', compact(['upcomingEvents', 'pastEvents']));
    }

    public function showTrack($track)
    {
        $upcomingEvents = \App\Event::where('event_track', $track)->where('event_date', '>', DB::raw('NOW()'))->orderBy('event_date', 'asc')->get();
        $pastEvents = \App\Event::where('event_track', $track)->where('event_date', '<=', DB::raw('NOW()'))->orderBy('event_date', 'desc')->get();

        return view('track', compact(['track', 'upcomingEvents', 'pastEvents']));
    }
    
    public function showInput() {
        $events = DB::table('events')->get();

        $organizers = DB::table('event_organizers')->get();
        return view('input_events', ['events'=> $events, 'organizers' => $organizers]);
    }

    public function storeEvent(Request $request){

        $validatedData = $request->validate([
            'eventName' => 'required|max:75',
            'eventDate' => 'required',
            'eventTrack' => 'required|max:45',
            'event_workers_needed' => 'max:11',
            
        ]);

        $event = new event();

        $event->event_name = request('eventName');
        $event->event_date = request('eventDate');
        $event->event_track = request('eventTrack');
        $event->organizer_id_for_event = request('organizerID');
        $event->event_workers_needed = request('event_workers_needed');

        $event->save();
        return redirect('/events/input');
    }

    public function editEvent($id){

        $event = event::find($id);
        $organizers = DB::table('event_organizers')->get();
        return view('edit_events', compact('event', 'id','organizers', ['organizers'=> $organizers]));

    }

    public function updateEvent(Request $request, $id){

        $request->validate([
            'eventName' => 'required|max:75',
            'eventDate' => 'required',
            'eventTrack' => 'required|max:45',
            'eventWorkers' => 'numeric|max:11',
        ]);

        $event = Event::find($id);
        
        $event->event_name = $request->get('eventName');
        $event->event_date = $request->get('eventDate');
        $event->event_track = $request->get('eventTrack');
        $event->organizer_id_for_event = $request->get('organizerID');
        $event->event_workers_needed = $request->get('eventWorkers');

        $event->save();
        
        return redirect('/events/input');
    }
    
    public function deleteEvent($id){

        $event = Event::where('event_id',$id)->first();
        if($event != null){
            DB::table('worker_event_registrations')->where('worker_event_registration_event_id', $id)->delete();
            $event->delete();
            return redirect('/events/input');
        }
        return redirect('/events/input');

    }
}
