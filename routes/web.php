<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleare group. Now create something great!
|
*/
Route::get('/import', 'ImportController@show');
Route::get('/import/workers', 'ImportController@importWorkers');

Route::get('/', 'HomeController@show');

Route::get('/events', 'EventController@show');
Route::get('/events/input', 'EventController@showInput');
Route::post('/event', 'EventController@storeEvent');

Route::get('/workers', 'WorkerController@showInput');
Route::get('/workers/input', 'WorkerController@show');
Route::post('/worker', 'WorkerController@storeWorker');
Route::get('/worker/edit/{worker_id}', 'WorkerController@editWorker');
Route::patch('/worker/update/{worker_id}', 'WorkerController@updateWorker');

Route::get('/organizers', 'EventOrganizersController@show');
Route::get('/organizers/input', 'EventOrganizersController@showInput');
Route::post('/organizer', 'EventOrganizersController@storeOrganizer');