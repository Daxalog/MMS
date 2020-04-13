<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Imports\EventImports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Event;


class EventController extends Controller
{

    public function show() {
        $workers = DB::table('workers')->get();
        return view('welcome', ['workers'=> $workers]);
    }
    //
    public function import(){
        
        Excel::import(new EventImports, 'storage/SampleData.xlsx');
        $workers = DB::table('workers')->get();
        return view('welcome', ['workers'=> $workers]);
    }
    
}
