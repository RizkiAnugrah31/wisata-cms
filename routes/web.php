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

Route::get('/login', 'LoginController@loginForm');
Route::post('/login', 'LoginController@doLogin')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group([
    'middleware' => 'customAuth'
], function () {
    Route::get('/', 'DashboardController@dashboard');

 Route::prefix('employees')->group(function () {
 Route::name('employee.')->group(function () {
 Route::get('/', 'EmployeeController@index')->name('index');
 Route::get('add', 'EmployeeController@add')->name('add');
 Route::post('add', 'EmployeeController@add_process');
    
    });

});
