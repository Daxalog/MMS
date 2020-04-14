<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventOrganizersController extends Controller
{
    //
    public function show(){
        $organizers = DB::table('event_organizers')->get();
        return view('organizers', ['organizers'=> $organizers]);
    }
}
