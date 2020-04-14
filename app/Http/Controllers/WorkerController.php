<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
