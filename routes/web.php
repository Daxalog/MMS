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
Route::get('/events/upcoming', 'EventController@showUpcoming');
Route::get('/events/{track}', 'EventController@showTrack');
Route::get('/events/input', 'EventController@showInput');
Route::post('/event', 'EventController@storeEvent');

Route::get('/workers', 'WorkerController@showInput');
Route::get('/workers/registrations/{worker}', 'WorkerController@registrations');
Route::post('/workers/registrations/{worker}', 'WorkerController@apply');
Route::get('/workers/input', 'WorkerController@show');
Route::post('/worker', 'WorkerController@storeWorker');

Route::get('/organizers', 'EventOrganizersController@show');
Route::get('/organizers/{organizer}', 'EventOrganizersController@showEvents');
Route::get('/organizers/input', 'EventOrganizersController@showInput');
Route::post('/organizer', 'EventOrganizersController@storeOrganizer');

Route::get('registrations', 'RegistrationController@list');
Route::get('registrations/summary', 'RegistrationController@summary');
Route::get('/registrations/{registration}', 'RegistrationController@show');
Route::post('/registrations/{registration}', 'RegistrationController@apply');

Route::get('/email', 'MailController@input');
Route::post('email/preview', 'MailController@preview');
Route::post('email/send', 'MailController@send');
Route::get('/import', 'ImportController@show');
Route::post('/import', 'ImportController@import');
