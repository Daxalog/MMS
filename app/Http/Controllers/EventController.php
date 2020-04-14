<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function show() {
        $events = DB::table('events')->get();
        return view('events', ['events'=> $events]);
    }
    
    public function showInput() {
        $events = DB::table('events')->get();
        return view('input_events', ['events'=> $events]);
    }
}
