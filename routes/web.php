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

Auth::routes();

// 一般ユーザ以上（つまり全権限）に許可
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {

    // トップページ関連
    Route::delete('/system_top/requestDestroy/{id}','SystemTopController@requestDestroy')->name('system_top.requestDestroy');
    Route::delete('/system_top/replyDestroy/{id}','SystemTopController@replyDestroy')->name('system_top.replyDestroy');
    Route::get('/system_top/editDoComp/{id}','SystemTopController@editDoComp')->name('system_top.editDoComp');
    Route::get('/system_top/doCompShow','SystemTopController@doCompShow')->name('system_top.doCompShow');
    Route::resource('/system_top',SystemTopController::class,['names' => ['index' => 'top']])->only([
        'index','create','store','edit','update'
    ]);

    // 勤務表関連
    Route::get('/work_table/doEdit','WorkTableController@doEdit')->name('work_table.doEdit');
    Route::get('/work_table/export','WorkTableController@export')->name('work_table.export');
    Route::get('/work_table/allExport','WorkTableController@allExport')->name('work_table.allExport');
    Route::resource('/work_table',WorkTableController::class)->only([
        'index','store'
    ]);

    // シフト表関連
    Route::get('/shift_table/export','ShiftTableController@export')->name('shift_table.export');
    Route::resource('/shift_table',ShiftTableController::class)->only([
        'index','store'
    ]);

    // 工数表関連
    Route::resource('/work_load',WorkLoadController::class)->only([
        'index'
    ]);

    // ファイル表示関連
    Route::get('/file_show', 'FileShowController@show')->name('file_show.show');
    Route::get('/file_addShow', 'FileShowController@addShow')->name('file_addShow.addShow');
    Route::get('/file_infoShow', 'FileShowController@infoShow')->name('file_infoShow.infoShow');
    Route::get('/file_projectsFileShow', 'FileShowController@projectsFileShow')->name('file_projectsFileShow.projectsFileShow');

    // パスワード変更関連
    Route::get('/change_password','ChangePasswordController@index')->name('change_password.index');
    Route::post('/change_password','ChangePasswordController@changePassword')->name('change_password.change');

    // 課題詳細ページ？？
    Route::get('/progress_detail/editDoComp','ProgressDetailController@editDoComp')->name('progress_detail.editDoComp');
    Route::resource('/progress_detail', 'ProgressDetailController')->only([
        'index','create','store','edit','update','destroy'
    ]);

    // 顧客管理ページ関連
    Route::resource('/master_clients', MasterClientsController::class)->only([
        'index','create','store','edit','update','destroy'
    ]);

    // 案件管理ページ関連
    Route::resource('/clients_detail',ClientsDetailController::class)->only([
        'index','create','store','edit','update','destroy'
    ]);

    // 案件ページ関連
    Route::resource('/master_projects', 'MasterProjectsController')->only([
        'index'
    ]);

    // 案件詳細ページ関連
    Route::get('/projects_detail','ProjectsDetailController@index')->name('project_detail');

    // ファイルアップロード関連
    Route::post('/file_posts/pr_detail','FilePostsController@pr_detail')->name('file_posts.pr_detail');
    Route::post('/file_posts/detail','FilePostsController@detail')->name('file_posts.detail');
    Route::post('/file_posts/pr_change','FilePostsController@pr_change')->name('file_posts.pr_change');
    Route::post('/file_posts/change','FilePostsController@change')->name('file_posts.change');
    Route::post('/file_posts/pr_del','FilePostsController@pr_del')->name('file_posts.pr_del');
    Route::post('/file_posts/del','FilePostsController@del')->name('file_posts.del');
    Route::get('/file_posts/restore','FilePostsController@restore')->name('file_posts.restore');
    Route::resource('/file_posts', 'FilePostsController')->only([
        'index','store','destroy'
    ]);

    // 追加ファイルアップロード関連
    Route::get('/add_file_posts/restore','AddFilePostController@restore')->name('add_file_posts.restore');
    Route::resource('/add_file_posts', 'AddFilePostController')->only([
        'destroy'
    ]);

    // ファイルアップロード実際の動作関連
    Route::resource('/upload','UploaderController')->only([
        'index','store','edit','update','destroy'
    ]);
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

    // 引き継ぎページ関連
    Route::get('/take_over/doEdit','TakeOverTheOperationController@doEdit')->name('take_over.doEdit');
    Route::get('/take_over/doWellKnown','TakeOverTheOperationController@doWellKnown')->name('take_over.doWellKnown');
    Route::get('/take_over/rmWellKnown','TakeOverTheOperationController@rmWellKnown')->name('take_over.rmWellKnown');
    Route::get('/take_over/restore','TakeOverTheOperationController@restore')->name('take_over.restore');
    Route::post('/take_over/filedel','TakeOverTheOperationController@filedel')->name('take_over.filedel');
    Route::post('/take_over/linkdel','TakeOverTheOperationController@linkdel')->name('take_over.linkdel');
    Route::resource('/take_over',TakeOverTheOperationController::class)->only([
        'index','create','store','update','destroy'
    ]);

    // 引き継ぎ追記ページ関連
    Route::get('/add_take_over/doEdit','AddTakeOverTheOperationController@doEdit')->name('add_take_over.doEdit');
    Route::post('/add_take_over/filedel','TakeOverTheOperationController@filedel')->name('add_take_over.filedel');
    Route::post('/add_take_over/linkdel','TakeOverTheOperationController@linkdel')->name('add_take_over.linkdel');
    Route::resource('/add_take_over','AddTakeOverTheOperationController')->only([
        'create','store','update','destroy'
    ]);

    // 引き継ぎ内検索ページ関連
    Route::post('/search_result','TakeOverSearchController@search')->name('search_result.search');

});

// 管理者以上（開発者＆管理者）に許可
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {

    // シフト管理ページ関連
    Route::get('/master_shifts/export','MasterShiftController@export')->name('master_shifts.export');
    Route::resource('/master_shifts',MasterShiftController::class)->only([
        'index','show'
    ]);

    // ユーザー管理ページ関連
    Route::get('/user_regist','UserRegistrationController@index')->name('user.index');
    Route::get('/user_regist/create','UserRegistrationController@create')->name('user.regist');
    Route::post('/user_regist/create','UserRegistrationController@store')->name('user.store');
    Route::get('/user_regist/edit/{id}','UserRegistrationController@edit')->name('user.edit');
    Route::post('/user_regist/edit/{id}','UserRegistrationController@update')->name('user.update');
    Route::post('/user_regist/password_reset/{id}','UserRegistrationController@password_reset')->name('user.password_reset');

    // 有給取得確認ページ関連
    Route::post('/paid_leave/ajax_change','PaidLeaveController@ajax_change')->name('paid_leave.ajax_change');
    Route::post('/paid_leave/ajax_store','PaidLeaveController@ajax_store')->name('paid_leave.ajax_store');
    Route::resource('/paid_leave',PaidLeaveController::class)->only([
        'index','create'
    ]);
});

// 開発者のみ許可
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

    // ----- 現在準備中のもの -----
    Route::post('/user_regist/order_of_row','UserRegistrationController@order_of_row')->name('user.order_of_row');

    Route::get('/live_monitaring_plan/master_show','LiveMonitaringPlanController@masterShow')->name('live_monitaring_plan.masterShow');
    Route::get('/live_monitaring_plan/master_create','LiveMonitaringPlanController@masterCreate')->name('live_monitaring_plan.masterCreate');
    Route::post('/live_monitaring_plan/master_create','LiveMonitaringPlanController@masterStore')->name('live_monitaring_plan.masterStore');
    Route::resource('/live_monitaring_plan',LiveMonitaringPlanController::class)->only([
        'index'
    ]);

        // ----- 勉強会用 -----
        Route::get('/study_session','StudySessionController@index01')->name('study_session.index01');

    // --------------------------

    // トップページマニュアル管理関連
    Route::resource('/top_information',FstSystemInformationController::class)->only([
        'create','store','edit','update','destroy'
    ]);

    // ユーザー管理【削除】に関するページ
    Route::delete('/user_regist/destroy/{id}','UserRegistrationController@destroy')->name('user.destroy');
    Route::get('/user_regist/restore/{id}','UserRegistrationController@restore')->name('user.restore');
    Route::delete('/user_regist/forceDelete/{id}','UserRegistrationController@forceDelete')->name('user.forceDelete');

    // ファイルをサーバから削除するためのページ関連
    Route::get('dev_deleted_items',[DevDeletedItemsController::class,'index'])->name('dev_deleted_items.index');

    // 自身の課題を管理するためのページ関連
    Route::get('dev_confirm','DevConfirmController@index')->name('dev_confirm.top');
    Route::get('/dev_confirm/add','DevConfirmController@add')->name('dev_confirm.add');
    Route::post('/dev_confirm/add','DevConfirmController@create')->name('dev_confirm.create');
    Route::get('/dev_confirm/dummy','DevConfirmController@dummy')->name('dev_confirm.dummy');
    Route::get('/dev_confirm/editPlanComp','DevConfirmController@editPlanComp')->name('dev_confirm.editPlanComp');
    Route::get('/dev_confirm/editDoComp','DevConfirmController@editDoComp')->name('dev_confirm.editDoComp');
    Route::delete('/dev_confirm/editDelete','DevConfirmController@editDelete')->name('dev_confirm.editDelete');
    Route::get('/dev_confirm/restore','DevConfirmController@restore')->name('dev_confirm.restore');

    // テストダミー用
    Route::get('/dummy/{year}/{month}','dummyController@index')->name('dummy.calendar');
    Route::resource('/dummy',dummyController::class)->only([

    ]);

});
