<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Imports\EventImports;
use App\Imports\WorkerImports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Event;


class ImportController extends Controller
{
    public function show() {
        return view('import');
    }
    
    public function importWorkers(){
        Excel::import(new WorkerImports, 'storage/SampleData.xlsx');
        $workers = DB::table('workers')->get();
        return view('all', ['workers'=> $workers]);
    }
}
