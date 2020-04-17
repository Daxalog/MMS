<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function list()
    {
        $registrations = \App\WorkerEventRegistration::all();

        return view('reports.registrations', compact(['registrations']));
    }

    public function show($id)
    {
    	$registrations = \App\WorkerEventRegistration::where('worker_event_registration_event_id', $id)->get();
    	$event = \App\Event::where('event_id', $id)->first();

    	return view('registration.select', compact(['registrations', 'event']));
    }

    public function apply(Request $request, $id)
    {
    	$registrations = \App\WorkerEventRegistration::where('worker_event_registration_event_id', $id)->get();
    	$event = \App\Event::where('event_id', $id)->first();

    	foreach($registrations as $regis)
    	{
    		if($request->get($regis->worker_event_registration_id))
    		{
    			if($regis->worker_selection_status != 's')
    			{
    				$regis->worker_selection_status = 's';
    				$regis->worker_selection_communicated = false;
    				$regis->timestamps = false;
    				$regis->save();
    			}
    		}
    		else
    		{
    			if($regis->worker_selection_status != 'd')
    			{
    				$regis->worker_selection_status = 'd';
    				$regis->worker_selection_communicated = false;
    				$regis->timestamps = false;
    				$regis->save();
    			}
    		}
    	}

        $msg = 'Selections have been applied!';

    	return view('registration.select', compact(['registrations', 'event', 'msg']));
    }
}
