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

        return view('worker_registrations', compact(['registrations', 'worker']));
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

        return view('worker_registrations', compact(['registrations', 'worker', 'msg']));
    }

    public function showInput() {
        $workers = DB::table('workers')->get();
        return view('workers', ['workers'=> $workers]);
    }

    public function storeWorker(Request $request){

        $validatedData = $request->validate([
            'workerFirstName' => 'required|max:30',
            'workerLastName' => 'required|max:40',
            'workerEmail' => 'required|max:60',
        ]);
        $worker = new Worker();

        $worker->worker_first_name = request('workerFirstName');
        $worker->worker_last_name = request('workerLastName');
        $worker->worker_email = request('workerEmail');

        $worker->save();
        return redirect('/workers/input');
    }

    public function editWorker($id){

        $worker = Worker::find($id);
        return view('edit_workers', compact('worker', 'id'));

    }

    public function updateWorker(Request $request, $id){

        $validatedData = $request->validate([
            'workerFirstName' => 'required|max:30',
            'workerLastName' => 'required|max:40',
            'workerEmail' => 'required|max:60',
        ]);

        $worker = Worker::find($id);
        $worker->worker_first_name = $request->get('workerFirstName');
        $worker->worker_last_name = $request->get('workerLastName');
        $worker->worker_email = $request->get('workerEmail');
        $worker->save();
        return redirect('/workers/input');
    }

    public function deleteWorker($id){

        $worker = Worker::where('worker_id',$id)->first();
        if($worker != null){
            $worker->delete();
            return redirect('/workers/input');
        }
        return redirect('/workers/input');

    }
}
