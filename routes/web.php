<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;

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
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->middleware('guest')->name('authenticate');

Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('store');

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::group(['middleware' => 'admin'], function() {
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'App\Http\Controllers\Admin',
        //'as' => 'admin.',
    ], function() {
        Route::get('dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
    });
    
});

Route::group(['middleware' => 'user'], function() {
    Route::group([
        'prefix' => 'user',
        'namespace' => 'App\Http\Controllers\User',
        //'as' => 'admin.',
    ], function() {
        Route::get('dashboard', 'UserDashboardController@index')->name('user.dashboard');
    });
    
});

//Route::resource('admin/tests', 'App\Http\Controllers\Admin\TestController');

//Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
//Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');





/*

Prefix Example : 
URL : 127.0.0.1:8000/admin/tasks
                      ^ PREFIX

What is 'as' => 'admin.' ?
<a href="{{ route('admin.tasks.index') }}>Task List</a>



Route::group(['middleware' => 'auth'], function() {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], function() {
        Route::get('tasks',
        [\App\Http\Controllers\Admin\TaskController::class, 'index'])
        ->name('tasks.index');
    });
    Route::group([
        'prefix' => 'user',
        'as' => 'user.',
    ], function() {
        Route::get('tasks',
        [\App\Http\Controllers\Admin\TaskController::class, 'index'])
        ->name('tasks.index');
    });
});

*/