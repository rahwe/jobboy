<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\FrontController;
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

//admin route



//employer route
Route::resource('jobs', JobController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::get('/change_status/{job}', 'App\Http\Controllers\JobController@changeStatus');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Frontend route
Route::get('/', 'App\Http\Controllers\FrontController@index');
Route::get('/job_detail/{job}', 'App\Http\Controllers\FrontController@show');
Route::get('/company_detail/{company}', 'App\Http\Controllers\FrontController@showCompany');
Route::get('/all_list_by_category/{category}', 'App\Http\Controllers\FrontController@showByCategory');



