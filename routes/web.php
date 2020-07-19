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

Route::resource('/system_top','SystemTopController',['names' => ['index' => 'top']]);

Route::get('/progress_detail/editDoComp','ProgressDetailController@editDoComp')->name('progress_detail.editDoComp');
Route::resource('/progress_detail', 'ProgressDetailController');

Route::resource('/master_clients', 'MasterClientsController');

Route::resource('/clients_detail','ClientsDetailController');

Route::resource('/master_projects', 'MasterProjectsController');

Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');

Route::resource('/file_posts', 'FilePostsController');

Route::get('/file_show', 'FileShowController@show');

Route::resource('/upload','UploaderController');

Route::get('/take_over/doEdit','TakeOverTheOperationController@doEdit')->name('take_over.doEdit');
Route::resource('/take_over','TakeOverTheOperationController');

Route::get('dev_confirm','DevConfirmController@index')->name('dev_confirm.top');
Route::get('/dev_confirm/add','DevConfirmController@add')->name('dev_confirm.add');
Route::post('/dev_confirm/add','DevConfirmController@create')->name('dev_confirm.create');
Route::get('/dev_confirm/dummy','DevConfirmController@dummy')->name('dev_confirm.dummy');
Route::get('/dev_confirm/editPlanComp','DevConfirmController@editPlanComp')->name('dev_confirm.editPlanComp');
Route::get('/dev_confirm/editDoComp','DevConfirmController@editDoComp')->name('dev_confirm.editDoComp');
Route::delete('/dev_confirm/editDelete','DevConfirmController@editDelete')->name('dev_confirm.editDelete');
Route::get('/dev_confirm/restore','DevConfirmController@restore')->name('dev_confirm.restore');

Route::resource('/dummy','dummyController');
