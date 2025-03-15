<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/about', function () {
    $name = "hala";
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
});
Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales'
    ];
    return view('about', compact('name', 'departments'));
});
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::delete('/tasks/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update');



// Users Routs
Route::get('users',  [UserController::class,'index']);
Route::post('create', [UserController::class, 'create']);
Route::post('delete/{id}', [UserController::class,'destroy']);
Route::post('edit/{id}',[UserController::class,'edit']);
Route::post('update', [UserController::class,'update']);
Route::get('app', function () {
    return view('layouts.app');
});