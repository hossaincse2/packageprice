<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    // Dashoboard 
    Route::get('/admin/dashboard', 'Admin\Dashboard\IndexController@index');
    Route::get('/admin/profile', 'Admin\Dashboard\IndexController@profile');
    
    

    // ........................ Privilege For Admin ......................................................................

    Route::group(['prefix' => 'admin','middleware' => 'role:admin'], function() {

        // Package 
        Route::get('package', 'Admin\Package\IndexController@index')->name('package');
        Route::get('add-package', 'Admin\Package\IndexController@create')->name('add-package');
        Route::post('add-package', 'Admin\Package\IndexController@store')->name('add-package');
        
        Route::get('add-package/{id}', 'Admin\Package\IndexController@create')->name('add-edit-package');
        Route::post('add-package/{id}', 'Admin\Package\IndexController@store')->name('store-package');

        Route::get('delete-package/{id}', 'Admin\Package\IndexController@destroy')->name('delete-package');

         // Users 
        Route::get('/admin/users', 'Admin\Users\IndexController@index');
        Route::get('/admin/changePassword', 'Admin\Users\IndexController@changePassword');

        //Order
        Route::get('/admin/orders', 'Admin\Order\IndexController@index');
        Route::get('/admin/order-reports', 'Admin\Order\IndexController@order_reports');

        //Activity Logs
        Route::get('audit-logs', 'Admin\ActivityLog\AuditLogsController@index')->name('audit-logs');
        Route::get('error-logs', 'Admin\ActivityLog\ErrorLogsController@index')->name('error-logs');

        // Audit Logs (22-05-2019, Created By Rajan Bhatta)

        Route::get('report/audit-log', 'Admin\ActivityLog\AuditLogsController@index')->name('audit-log');
        Route::get('report/audit-log-ajax', 'Admin\ActivityLog\AuditLogsController@ajax')->name('audit-log-ajax');
        Route::get('report/audit-log-print', 'Admin\ActivityLog\AuditLogsController@_print')->name('audit-log-print');


        // Error Logs (22-05-2019, Created By Rajan Bhatta)

        Route::get('report/error-log', 'Admin\ActivityLog\ErrorLogsController@index')->name('error-log');
        Route::get('report/error-log-ajax', 'Admin\ActivityLog\ErrorLogsController@ajax')->name('error-log-ajax');
        Route::get('report/error-log-print', 'Admin\ActivityLog\ErrorLogsController@_print')->name('error-log-print');

    });

});
