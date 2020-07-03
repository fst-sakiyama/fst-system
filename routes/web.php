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
Route::get('/system_top/add','SystemTopController@add')->name('system_top.add');
Route::post('/system_top/add','SystemTopController@create')->name('system_top.create');
Route::get('/system_top/dummy','SystemTopController@dummy')->name('system_top.dummy');
Route::get('/system_top/editPlanComp','SystemTopController@editPlanComp')->name('system_top.editPlanComp');
Route::get('/system_top/editDoComp','SystemTopController@editDoComp')->name('system_top.editDoComp');
Route::delete('/system_top/editDelete','SystemTopController@editDelete')->name('system_top.editDelete');
Route::get('/system_top/restore','SystemTopController@restore')->name('system_top.restore');

Route::resource('/progress_detail', 'ProgressDetailController');

Route::resource('/master_clients', 'MasterClientsController');

Route::resource('/clients_detail','ClientsDetailController');

Route::resource('/master_projects', 'MasterProjectsController');

Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');

Route::resource('/file_posts', 'FilePostsController');

Route::get('/file_show', 'FileShowController@show');

Route::resource('/upload','UploaderController');
