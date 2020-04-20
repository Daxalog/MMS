<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events;

class HomeController extends Controller
{
    public function show() {

        $upcomingEvents = \App\Event::where('event_date', '>', \DB::raw('NOW()'))->orderBy('event_date', 'asc')->get();
        //$events = DB::table('events')->get();
        return view('home', compact(['upcomingEvents']));
        //return view('home', ['events'=> $events]);
        //return view('home');
    }


}
