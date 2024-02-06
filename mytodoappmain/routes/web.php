<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\TodosController::class, 'index'])->name('home');

// Route::get('/demo', [App\Http\Controllers\TodosController::class, 'index'])->name('demo');
Route::resource('todo','App\Http\Controllers\TodosController');
