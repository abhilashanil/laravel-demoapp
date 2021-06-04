<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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


Route::get('/', [StudentController::class, 'index']);
Route::get('/addstudent', [StudentController::class, 'addstudent']);
Route::post('/savestudent', [StudentController::class, 'savestudent'])->name('store');
Route::get('/editstudent/{id}', [StudentController::class, 'editstudent']);
Route::post('/edit/{id}', [StudentController::class, 'updatestudent'])->name('updatestudent');
Route::get('/removestudent/{id}', [StudentController::class, 'deletestudent']);
Route::get('/studentmarks', [StudentController::class, 'studentmarks']);
Route::get('/addstudentmark', [StudentController::class, 'addstudentmark']);
Route::post('/savestudentmark', [StudentController::class, 'savestudentmark'])->name('storemark');
Route::get('/editstudentmark/{id}', [StudentController::class, 'editstudentmark']);
Route::post('/editmark/{id}', [StudentController::class, 'updatestudentmark'])->name('updatestudentmark');
Route::get('/removestudentmark/{id}', [StudentController::class, 'deletestudentmark']);