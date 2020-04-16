<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function input()
    {
    	$upcomingEvents = \App\Event::where('event_date', '>', \DB::raw('NOW()'))->get();
    	$pastEvents = \App\Event::where('event_date', '<=', \DB::raw('NOW()'))->get();

    	return view('mail.input', compact(['upcomingEvents', 'pastEvents']));
    }

    public function preview(Request $request)
    {
    	$message = $request->get('message');

    	$allEvents = \App\Event::orderBy('event_date', 'asc')->get();
    	$events = [];

    	foreach ($allEvents as $eventId)
    	{
    		if($request->get($eventId->event_id))
    		{
    			array_push($events, $eventId);
    		}
    	}

    	$selections = [];
    	foreach ($events as $event)
    	{
    		$selectionSet = $event->registrations;

    		foreach ($selectionSet as $selection) 
    		{
    			array_push($selections, $selection);
    		}
    	}

    	$allWorkers = \App\Worker::orderBy('worker_last_name', 'desc')->get();
    	$workers = [];
    	$recipients = [];

    	foreach ($allWorkers as $worker)
    	{
    		$workerFound = false;
    		$recipientFound = false;
    		foreach ($selections as $selection) 
    		{
    			if($selection->worker_event_registration_worker_id == $worker->worker_id)
    			{
    				if($selection->worker_selection_status == 's'  && !$workerFound)
    				{
    					array_push($workers, $worker);
    					$workerFound = true;
    				}

    				if((!$selection->worker_selection_communicated && !$recipientFound) || ($request->get('sendAll') && !$recipientFound))
    				{
    					array_push($recipients, $worker);
    					$recipientFound = true;
    				}
    			}
    		}
    	}

    	if(count($recipients) == 0)
    	{
    		return \Redirect::back()->with('msg', 'No emails currently need to be sent out.');
    	}

    	$recipient = $recipients[0];

    	$bodyMessage = !isset($bodyMessage) ? '' : $bodyMessage;

    	\Session::put('message', $bodyMessage);
    	\Session::put('events', $events);
    	\Session::put('selections', $selections);
    	\Session::put('workers', $workers);
    	\Session::put('recipients', $recipients);

    	return view('mail.preview', compact(['bodyMessage', 'events', 'selections', 'workers', 'recipients', 'recipient']));
    }

    public function send()
    {
    	$message = \Session::pull('message');
    	$events = \Session::pull('events');
    	$selections = \Session::pull('selections');
    	$workers = \Session::pull('workers');
    	$recipients = \Session::pull('recipients');

    	foreach ($recipients as $recipient) 
    	{
    		\Mail::to($recipient->worker_email)->send(new \App\Mail\SelectionEmail($message, $recipient, $workers, $events, $selections));
    	}
    	foreach ($selections as $selection)
		{
			$selection->worker_selection_communicated = true;
			$selection->timestamps = false;
			$selection->save();
		}

    	return redirect('/email')->with('msg', 'Emails successfully sent!');
    }
}
