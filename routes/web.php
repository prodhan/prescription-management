<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'HomeController@index');


Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');




//Patients
Route::resource('serials', 'PatientSerialController');
Route::resource('prescriptions', 'PrescriptionController');


//Serial management
Route::resource('serials', 'PatientSerialController');




// JSON data
Route::get('getreferer/{refer_type}', 'ReferController@getReferer');
Route::get('getpatient/{phone}', 'PatientController@get_patient_data');
Route::get('getserial/{phone}', 'PatientSerialController@get_serial_data');

