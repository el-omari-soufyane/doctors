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
Auth::routes();
Route::get("/",function()
{     if(Auth::check())
     {
        return redirect("/home");
     }
     else
     {
        return view('auth.login');
     }
});

Route::group(['middleware'=>'auth'],function()
{
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/patients/getpatient', 'PatientController@getpatient')->name('patients.getpatient');
Route::resource('/patients', 'PatientController');
Route::resource('/appointment', 'AppointmentController');
Route::resource('/consultation', 'ConsultationController');
});

