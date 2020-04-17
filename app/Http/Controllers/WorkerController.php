<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Worker;

class WorkerController extends Controller
{
    //
    public function show(){
        $workers = DB::table('workers')->get();
        return view('input_workers', ['workers'=> $workers]);
    }

    public function registrations($id)
    {
        $registrations = \App\WorkerEventRegistration::where('worker_event_registration_worker_id', $id)->get();
        $worker = \App\Worker::where('worker_id', $id)->first();

        return view('reports.worker_registrations', compact(['registrations', 'worker']));
    }

    public function apply(Request $request, $id)
    {
        $registrations = \App\WorkerEventRegistration::where('worker_event_registration_worker_id', $id)->get();
        $worker = \App\Worker::where('worker_id', $id)->first();

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

        return view('reports.worker_registrations', compact(['registrations', 'worker', 'msg']));
    }

    public function showInput() {
        $workers = DB::table('workers')->get();
        return view('workers', ['workers'=> $workers]);
    }

    public function storeWorker(){

        $worker = new Worker();

        $worker->worker_first_name = request('workerFirstName');
        $worker->worker_last_name = request('workerLastName');
        $worker->worker_email = request('workerEmail');
        
        $worker->save();
        return redirect('/workers/input');
    }
}
