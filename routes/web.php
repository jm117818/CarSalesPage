<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
});

Route::get('/home', [CarsController::class, 'show'])->name('home');
Route::get('/', [CarsController::class, 'show'])->name('home');

Route::get('/adding', [CarsController::class, 'index'])->name('adding');
Route::get('/usercars', [CarsController::class, 'showusercars'])->name('usercars')->middleware('auth');
Route::post('/add', [CarsController::class, 'add']);

Route::get('/offer/accept/{car}', [CarsController::class, 'activate'])->name('activate')->middleware('auth');

Route::get('/dashboard', function () {
    return redirect('/home');
});

Route::get('/edit/{id}', [CarsController::class, 'edit'])->middleware('auth');
Route::get('/delete/{id}', [CarsController::class, 'delete'])->middleware('auth');
Route::post('/update', [CarsController::class, 'update'])->name('update')->middleware('auth');

Route::get("/detail/{car}", [CarsController::class, 'detail'])->name('details');


Route::get('/search/',[CarsController::class,'search'])->name('search');
