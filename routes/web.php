<?php

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('patients', 'PatientController')->only([
    'create', 'store'
]);

Route::resource('appointments', 'AppointmentController');

// Route::get('/accept', 'AppointmentController@accept');
Route::get('/decline/{appointment}', 'AppointmentController@decline');
