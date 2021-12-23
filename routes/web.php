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

Route::get('/login', 'LoginController@loginForm');
Route::post('/login', 'LoginController@doLogin')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group([
    'middleware' => 'customAuth'
], function () {
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');

    Route::get('contoh/data', 'ContohController@dataTable');
    Route::get('contoh', 'ContohController@index')->name('contoh.index');
    Route::get('contoh/create', 'ContohController@create')->name('contoh.create');
    Route::post('contoh/create', 'ContohController@store')->name('contoh.store');
    Route::get('contoh/detail/{id}', 'ContohController@edit')->name('contoh.edit');
    Route::post('contoh/detail/{id}', 'ContohController@update')->name('contoh.update');
    Route::get('contoh/delete/{id}', 'ContohController@destroy')->name('contoh.destroy');
});
