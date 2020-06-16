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
    return redirect()->route('top');
});

Route::get('system-top','SystemTopController@index')->name('top');

Route::get('/master-clients','MasterClinetController@index')->name('master-client');

Route::get('/master-projects','MasterProjectController@index')->name('master-project');
