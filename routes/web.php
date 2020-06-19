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

Route::get('system_top','SystemTopController@index')->name('top');

Route::get('/master_clients','MasterClinetController@index')->name('master_client');

Route::get('/clients_detail','ClientsDetailController@index')->name('client_detail');

Route::get('/master_projects','MasterProjectController@index')->name('master_project');

Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');
