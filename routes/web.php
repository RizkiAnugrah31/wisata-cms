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

$router->get('/', function () {
    return view('layouts.master');
});

$router->post('/Employee/login','Cms\AuthEmployeeController@login');


