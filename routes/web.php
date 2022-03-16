<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;


Route::get('/', [ContactsController::class, 'index'])->name('contact');

// 確認ページ
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('confirm');

// DB挿入
Route::post('/process', [ContactsController::class, 'process'])->name('process');

// 完了ページ
Route::get('/complete', [ContactsController::class, 'complete'])->name('complete');

//管理システム
Route::get('/show', [ContactsController::class, 'show'])->name('show');
Route::get('/search', [ContactsController::class, 'search'])->name('search');
Route::post('/destroy/{id}', [ContactsController::class, 'destroy'])->name('destroy');
Route::get('view/{id}', [ContactsController::class, 'view'])->name('view');

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

//Route::get('/', function () {
    //return view('welcome');
//});
