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
}
