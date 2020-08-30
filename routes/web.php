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

Route::delete('/system_top/requestDestroy/{id}','SystemTopController@requestDestroy')->name('system_top.requestDestroy');
Route::delete('/system_top/replyDestroy/{id}','SystemTopController@replyDestroy')->name('system_top.replyDestroy');
Route::get('/system_top/editDoComp/{id}','SystemTopController@editDoComp')->name('system_top.editDoComp');
Route::get('/system_top/docomp_show','SystemTopController@doCompShow')->name('system_top.doCompShow');
Route::resource('/system_top','SystemTopController',['names' => ['index' => 'top']]);

Route::get('/progress_detail/editDoComp','ProgressDetailController@editDoComp')->name('progress_detail.editDoComp');
Route::resource('/progress_detail', 'ProgressDetailController');

Route::resource('/master_clients', 'MasterClientsController');

Route::resource('/clients_detail','ClientsDetailController');

Route::resource('/master_projects', 'MasterProjectsController');

Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');

Route::get('/file_posts/restore','FilePostsController@restore')->name('file_posts.restore');
Route::resource('/file_posts', 'FilePostsController');

Route::get('/add_file_posts/restore','AddFilePostController@restore')->name('add_file_posts.restore');
Route::resource('/add_file_posts', 'AddFilePostController');

Route::get('/file_show', 'FileShowController@show')->name('file_show.show');
Route::get('/file_addShow', 'FileShowController@addShow')->name('file_addShow.addShow');

Route::resource('/upload','UploaderController');

Route::get('/take_over/doEdit','TakeOverTheOperationController@doEdit')->name('take_over.doEdit');
Route::get('/take_over/doWellKnown','TakeOverTheOperationController@doWellKnown')->name('take_over.doWellKnown');
Route::get('/take_over/rmWellKnown','TakeOverTheOperationController@rmWellKnown')->name('take_over.rmWellKnown');
Route::get('/take_over/restore','TakeOverTheOperationController@restore')->name('take_over.restore');
Route::post('/take_over/filedel','TakeOverTheOperationController@filedel')->name('take_over.filedel');
Route::post('/take_over/linkdel','TakeOverTheOperationController@linkdel')->name('take_over.linkdel');
Route::resource('/take_over','TakeOverTheOperationController');

Route::get('/add_take_over/doEdit','AddTakeOverTheOperationController@doEdit')->name('add_take_over.doEdit');
Route::post('/add_take_over/filedel','TakeOverTheOperationController@filedel')->name('add_take_over.filedel');
Route::post('/add_take_over/linkdel','TakeOverTheOperationController@linkdel')->name('add_take_over.linkdel');
Route::resource('/add_take_over','AddTakeOverTheOperationController');

Route::post('/search_result','TakeOverSearchController@search')->name('search_result.search');

Route::get('dev_deleted_items','DevDeletedItemsController@index')->name('dev_deleted_items.index');

Route::get('dev_confirm','DevConfirmController@index')->name('dev_confirm.top');
Route::get('/dev_confirm/add','DevConfirmController@add')->name('dev_confirm.add');
Route::post('/dev_confirm/add','DevConfirmController@create')->name('dev_confirm.create');
Route::get('/dev_confirm/dummy','DevConfirmController@dummy')->name('dev_confirm.dummy');
Route::get('/dev_confirm/editPlanComp','DevConfirmController@editPlanComp')->name('dev_confirm.editPlanComp');
Route::get('/dev_confirm/editDoComp','DevConfirmController@editDoComp')->name('dev_confirm.editDoComp');
Route::delete('/dev_confirm/editDelete','DevConfirmController@editDelete')->name('dev_confirm.editDelete');
Route::get('/dev_confirm/restore','DevConfirmController@restore')->name('dev_confirm.restore');

Route::resource('/dummy','dummyController');
