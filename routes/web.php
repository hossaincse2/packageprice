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

// Route::get('/', function () {
//     return view('welcome');
// });

// use Symfony\Component\Routing\Route;

Route::get('/', 'Frontend\Home\IndexController@index')->name('welcome');

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
        Route::get('users', 'Admin\Users\IndexController@index')->name('users');
        Route::get('change-password', 'Admin\Users\IndexController@changePassword')->name('change-password');

        //Order
        Route::get('orders', 'Admin\Order\IndexController@index')->name('orders');
        Route::get('order-reports', 'Admin\Order\IndexController@order_reports')->name('order-reports');

         //Reports 
         Route::get('user-package-reports','Admin\Users\IndexController@packageReport')->name('user-package-reports');

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
