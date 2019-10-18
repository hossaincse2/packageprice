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

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    // Dashoboard 
    Route::get('/admin/dashboard', 'Admin\Dashboard\IndexController@index');
    Route::get('/admin/profile', 'Admin\Dashboard\IndexController@profile');
    
    

    // ........................ Privilege For Admin ......................................................................

    Route::group(['middleware' => 'role:admin'], function() {

        // Package 
        Route::get('/admin/package', 'Admin\Package\IndexController@index');
        Route::get('/admin/package/create', 'Admin\Package\IndexController@create');

         // Users 
        Route::get('/admin/users', 'Admin\Users\IndexController@index');
        Route::get('/admin/changePassword', 'Admin\Users\IndexController@changePassword');

        //Order
        Route::get('/admin/orders', 'Admin\Order\IndexController@index');
        Route::get('/admin/order-reports', 'Admin\Order\IndexController@order_reports');

        //Activity Logs
        Route::get('/admin/order', 'Admin\ActivityLog\IndexController@auditLog');
        Route::get('/admin/order-reports', 'Admin\ActivityLog\IndexController@errorLog');

    });

});
