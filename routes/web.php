<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\LoginController;



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
    return view('layouts.master');
})->name('dashboard');

$router->post('/Employee/login','Cms\AuthEmployeeController@login');

Route::prefix('employees')->group(function () {
    Route::name('employee.')->group(function () {
        Route::get('/', 'EmployeeController@index')->name('index');
<<<<<<< HEAD
=======
        Route::get('add', 'EmployeeController@add')->name('add');

        Route::post('add', 'EmployeeController@add_process');
>>>>>>> 1b4e5e590fdf0bfafae4a106ce52970c501e9399
    });
});
