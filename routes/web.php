<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\SystemTopController;
use App\Http\Controllers\DevDeletedItemsController;

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
    return redirect()->route('login');
});

Route::get('/register','HomeController@index')->name('login');

Route::get('/calendar_show','CalendarController@show')->name('calendar.show');

// Route::get('/calendar_take_over_view','CalendarTakeOverViewController@form')->name("calendar_take_over_view");
// Route::post('/calendar_take_over_view','CalendarTakeOverViewController@update')->name("calendar_take_over_view.update");

Auth::routes();
// Route::get('/setting', 'SettingController@index')->name('setting');
// Route::get('/setting/password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('password.form');
// Route::post('/setting/password', 'Auth\ChangePasswordController@changePassword')->name('password.change');
// Route::get('/setting/deactive', 'Auth\DeactiveController@showDeactiveForm')->name('deactive.form');
// Route::post('/setting/deactive', 'Auth\DeactiveController@deactive')->name('deactive');
// Route::get('/setting/name', 'SettingController@showChangeNameForm')->name('name.form');
// Route::post('/setting/name', 'SettingController@changeName')->name('name.change');
// Route::get('/setting/email', 'SettingController@showChangeEmailForm')->name('email.form');
// Route::post('/setting/email', 'SettingController@changeEmail')->name('email.change');

// 一般ユーザ以上（つまり全権限）に許可
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {

    Route::delete('/system_top/requestDestroy/{id}','SystemTopController@requestDestroy')->name('system_top.requestDestroy');
    Route::delete('/system_top/replyDestroy/{id}','SystemTopController@replyDestroy')->name('system_top.replyDestroy');
    Route::get('/system_top/editDoComp/{id}','SystemTopController@editDoComp')->name('system_top.editDoComp');
    Route::get('/system_top/doCompShow','SystemTopController@doCompShow')->name('system_top.doCompShow');
    Route::resource('/system_top',SystemTopController::class,['names' => ['index' => 'top']]);

    Route::get('/file_show', 'FileShowController@show')->name('file_show.show');
    Route::get('/file_addShow', 'FileShowController@addShow')->name('file_addShow.addShow');

    Route::get('/change_password','ChangePasswordController@index')->name('change_password.index');
    Route::post('/change_password','ChangePasswordController@changePassword')->name('change_password.change');

    Route::get('/progress_detail/editDoComp','ProgressDetailController@editDoComp')->name('progress_detail.editDoComp');
    Route::resource('/progress_detail', 'ProgressDetailController');

    Route::resource('/master_clients', MasterClientsController::class);

    Route::resource('/clients_detail',ClientsDetailController::class);

    Route::resource('/master_projects', 'MasterProjectsController');

    Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');

    Route::get('/file_posts/restore','FilePostsController@restore')->name('file_posts.restore');
    Route::resource('/file_posts', 'FilePostsController');

    Route::get('/add_file_posts/restore','AddFilePostController@restore')->name('add_file_posts.restore');
    Route::resource('/add_file_posts', 'AddFilePostController');

    Route::resource('/upload','UploaderController');
});

// 経理チームのみ許可
Route::group(['middleware' => ['auth', 'can:account-only']], function () {

});

// 営業チームのみ許可
Route::group(['middleware' => ['auth', 'can:sales-only']], function () {

});

// 開発チームのみ許可
Route::group(['middleware' => ['auth', 'can:dev-only']], function () {

});

// 運用チームのみ許可
Route::group(['middleware' => ['auth', 'can:ope-only']], function () {

    Route::get('/take_over/doEdit','TakeOverTheOperationController@doEdit')->name('take_over.doEdit');
    Route::get('/take_over/doWellKnown','TakeOverTheOperationController@doWellKnown')->name('take_over.doWellKnown');
    Route::get('/take_over/rmWellKnown','TakeOverTheOperationController@rmWellKnown')->name('take_over.rmWellKnown');
    Route::get('/take_over/restore','TakeOverTheOperationController@restore')->name('take_over.restore');
    Route::post('/take_over/filedel','TakeOverTheOperationController@filedel')->name('take_over.filedel');
    Route::post('/take_over/linkdel','TakeOverTheOperationController@linkdel')->name('take_over.linkdel');
    Route::resource('/take_over',TakeOverTheOperationController::class);

    Route::get('/add_take_over/doEdit','AddTakeOverTheOperationController@doEdit')->name('add_take_over.doEdit');
    Route::post('/add_take_over/filedel','TakeOverTheOperationController@filedel')->name('add_take_over.filedel');
    Route::post('/add_take_over/linkdel','TakeOverTheOperationController@linkdel')->name('add_take_over.linkdel');
    Route::resource('/add_take_over','AddTakeOverTheOperationController');

    Route::post('/search_result','TakeOverSearchController@search')->name('search_result.search');

});

// 管理者以上（開発者＆管理者）に許可
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {

    Route::get('/user_regist','UserRegistrationController@index')->name('user.index');
    Route::get('/user_regist/create','UserRegistrationController@create')->name('user.regist');
    Route::post('/user_regist/create','UserRegistrationController@store')->name('user.store');
    Route::get('/user_regist/edit/{id}','UserRegistrationController@edit')->name('user.edit');
    Route::post('/user_regist/edit/{id}','UserRegistrationController@update')->name('user.update');
    Route::post('/user_regist/password_reset/{id}','UserRegistrationController@password_reset')->name('user.password_reset');

});

// 開発者のみ許可
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

    // ----- 現在準備中のもの -----
    Route::get('/master_shifts/export','MasterShiftController@export')->name('master_shifts.export');
    Route::resource('/master_shifts',MasterShiftController::class);

    Route::get('/work_table/doEdit','WorkTableController@doEdit')->name('work_table.doEdit');
    Route::resource('/work_table',WorkTableController::class);

    Route::get('/shift_table/export','ShiftTableController@export')->name('shift_table.export');
    Route::resource('/shift_table',ShiftTableController::class);
    // --------------------------

    Route::delete('/user_regist/destroy/{id}','UserRegistrationController@destroy')->name('user.destroy');
    Route::get('/user_regist/restore/{id}','UserRegistrationController@restore')->name('user.restore');
    Route::delete('/user_regist/forceDelete/{id}','UserRegistrationController@forceDelete')->name('user.forceDelete');


    Route::get('/dummy/{year}/{month}','dummyController@index')->name('dummy.calendar');
    Route::resource('/dummy',dummyController::class);

    Route::get('dev_deleted_items',[DevDeletedItemsController::class,'index'])->name('dev_deleted_items.index');

    Route::get('dev_confirm','DevConfirmController@index')->name('dev_confirm.top');
    Route::get('/dev_confirm/add','DevConfirmController@add')->name('dev_confirm.add');
    Route::post('/dev_confirm/add','DevConfirmController@create')->name('dev_confirm.create');
    Route::get('/dev_confirm/dummy','DevConfirmController@dummy')->name('dev_confirm.dummy');
    Route::get('/dev_confirm/editPlanComp','DevConfirmController@editPlanComp')->name('dev_confirm.editPlanComp');
    Route::get('/dev_confirm/editDoComp','DevConfirmController@editDoComp')->name('dev_confirm.editDoComp');
    Route::delete('/dev_confirm/editDelete','DevConfirmController@editDelete')->name('dev_confirm.editDelete');
    Route::get('/dev_confirm/restore','DevConfirmController@restore')->name('dev_confirm.restore');

});


//Route::get('/home', 'HomeController@index')->name('home');
