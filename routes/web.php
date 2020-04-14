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
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/import', 'ImportController@import');
Route::get('/import/events', 'ImportController@importEvents');
Route::get('/import/workers', 'ImportController@importWorkers');


Route::get('/', 'ImportController@showHome');
Route::get('/all', 'ImportController@showAll');
Route::get('/workers', 'ImportController@showWorkers');
Route::get('/events', 'ImportController@showEvents');
//Route::get('user/{id}', 'UserController@show');

Route::get('/workers/input', 'WorkerController@show');
Route::get('/events/input', 'WorkerController@show');
