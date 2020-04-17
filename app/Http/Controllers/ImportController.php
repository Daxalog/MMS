<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RegistrationImport;
use App\Imports\WorkerImports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Event;
use Exception;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function show() {
        return view('import');
    }

    public function import(Request $request) {

        $initialWorkersCount = DB::table('workers')->count();
        $initialRegistrationCount = DB::table('worker_event_registrations')->count();
        
        $errors = array();
        $messages = array();

        $extension = strtolower($request->ExcelFile->getClientOriginalExtension());

        if($extension !== 'xlsx'){
            array_push($errors, 'File must be of type xlsx.');
            return view('import', ['errors'=> $errors]);
        }

        try {
            Excel::import(new WorkerImports, $request->ExcelFile);
            Excel::import(new RegistrationImport, $request->ExcelFile);  
        } catch (Exception $e) {
            error_log($e);
            array_push($errors, 'An error occured when attempting to read your Excel file.');
            return view('import', ['errors' => $errors]);
        }

        $newWorkerCount = DB::table('workers')->count();
        $newRegistrationCount = DB::table('worker_event_registrations')->count();

        $workerDifference = $newWorkerCount - $initialWorkersCount;
        $registrationDifference = $newRegistrationCount - $initialRegistrationCount;

        array_push($messages, 'Success.');
        array_push($messages, $workerDifference . ' worker(s) added.');
        array_push($messages, $registrationDifference . ' registrations(s) added.');
        return view('import', ['messages' => $messages]);
    }
}
