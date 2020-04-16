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

Route::get('/organizers', 'EventOrganizersController@show');
Route::get('/organizers/input', 'EventOrganizersController@showInput');
Route::post('/organizer', 'EventOrganizersController@storeOrganizer');

Route::get('/registrations/{registration}', 'RegistrationController@show');
Route::post('/registrations/{registration}', 'RegistrationController@apply');

Route::get('/email', 'MailController@input');
Route::post('email/preview', 'MailController@preview');
Route::post('email/send', 'MailController@send');