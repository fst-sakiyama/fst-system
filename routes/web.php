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

Route::resource('/master_clients', 'MasterClientsController');

Route::get('/clients_detail','ClientsDetailController@index')->name('client_detail');

Route::resource('/master_projects', 'MasterProjectsController');

Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');

Route::get('/upload','UploaderController@index');
Route::Post('/upload','UploaderController@upload');
