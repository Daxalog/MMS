<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function list()
    {
        $registrations = \App\WorkerEventRegistration::all();

        return view('registrations', compact(['registrations']));
    }

    public function show($id)
    {
    	$registrations = \App\WorkerEventRegistration::where('worker_event_registration_event_id', $id)->get();
    	$event = \App\Event::where('event_id', $id)->first();

    	return view('registration_select', compact(['registrations', 'event']));
    }

    public function summary()
    {
        $workers = \App\Worker::orderBy('worker_first_name', 'asc')->get();
        $counts = [];

        foreach ($workers as $worker)
        {
            $collection = [];

            array_push($collection, $worker->worker_first_name);
            array_push($collection, $worker->worker_last_name);
            array_push($collection, $worker->worker_email);
            array_push($collection, count($worker->registrations));
            array_push($collection, count(\App\WorkerEventRegistration::where('worker_event_registration_worker_id', $worker->worker_id)->where('worker_selection_status', 's')->get()));

            array_push($counts, $collection);
        }

        return view('registration_summary', compact(['counts']));
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

    	return view('registration_select', compact(['registrations', 'event', 'msg']));
    }
}
