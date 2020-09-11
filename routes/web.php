<?php

use App\Http\Controllers\TasksController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('tareas', [TasksController::class, 'index'])->name('getTasks');

Route::post('tareas', [TasksController::class, 'store'])->name('createTask');

Route::get('tareas/{id}', [TasksController::class, 'show'])->name('getTask');

Route::delete('tareas/{id}', [TasksController::class, 'destroy'])->name('deleteTask');
