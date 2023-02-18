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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/changeStatus/{id}', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('user.changeStatus');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth', 'checkrole:user,admin');

Route::get('/admin/approve', function () {
    return view('user.dashboard');
})->middleware('auth', 'checkrole:admin');