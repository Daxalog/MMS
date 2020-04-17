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
Route::get('/', 'HomeController@show');

Route::get('/events', 'EventController@show');
Route::get('/events/input', 'EventController@showInput');
Route::post('/event', 'EventController@storeEvent');
Route::get('/event/edit/{event_id}', 'EventController@editEvent');
Route::post('/event/update/{event_id}', 'EventController@updateEvent');
Route::delete('/event/delete/{event_id}', 'EvenrController@deleteEvent');

Route::get('/workers', 'WorkerController@showInput');
Route::get('/workers/input', 'WorkerController@show');
Route::post('/worker', 'WorkerController@storeWorker');
Route::get('/worker/edit/{worker_id}', 'WorkerController@editWorker');
Route::patch('/worker/update/{worker_id}', 'WorkerController@updateWorker');
Route::delete('/worker/delete/{worker_id}', 'WorkerController@deleteWorker');

Route::get('/organizers', 'EventOrganizersController@show');
Route::get('/organizers/input', 'EventOrganizersController@showInput');
Route::post('/organizer', 'EventOrganizersController@storeOrganizer');
Route::get('/organizer/edit/{event_organizer_id}', 'EventOrganizersController@editOrganizer');
Route::patch('/organizer/update/{event_organizer_id}', 'EventOrganizersController@updateOrganizer');
Route::delete('/organizer/delete/{event_organizer_id}', 'EventOrganizersController@deleteOrganizer');

Route::get('/registrations/{registration}', 'RegistrationController@show');
Route::post('/registrations/{registration}', 'RegistrationController@apply');

Route::get('/email', 'MailController@input');
Route::post('email/preview', 'MailController@preview');
Route::post('email/send', 'MailController@send');
Route::get('/import', 'ImportController@show');
Route::post('/import', 'ImportController@import');
