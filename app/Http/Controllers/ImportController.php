<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\RegistrationImport;
use App\Imports\WorkerImports;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Event;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function show() {
        return view('import');
    }
    
    public function import(Request $request) {

        Excel::import(new WorkerImports, $request->ExcelFile);
        Excel::import(new RegistrationImport, $request->ExcelFile);

        return redirect('import');
    }
}
