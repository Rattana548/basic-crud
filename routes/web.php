<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypepetController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/typepet/all',[TypepetController::class,'index'])->name('typepet');
    Route::post('/typepet/add',[TypepetController::class,'insert'])->name('addtypepet');
    Route::post('/typepet/update/{id}',[TypepetController::class,'update'])->name('update');
    Route::get('/typepet/edit/{id}',[TypepetController::class,'edit'])->name('edit');
    Route::get('/typepet/restore/{id}',[TypepetController::class,'restore'])->name('restore');
    Route::get('/typepet/delete/{id}',[TypepetController::class,'delete'])->name('delete');
    Route::get('/typepet/bin',[TypepetController::class,'bin'])->name('bin');
    Route::get('/typepet/softdelete/{id}',[TypepetController::class,'softdelete'])->name('softdelete');



});
