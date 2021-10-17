<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::get('/', function () {
    return view('welcome');
});

Route::view('/upload', 'upload')->name('upload');
Route::get('/ajax/post_firebase', [HomeController::class, 'ajaxFirebase']);

Route::get('/download/{key}', [HomeController::class, 'download'])->name('download');
