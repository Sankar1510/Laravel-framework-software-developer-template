<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/

Route::get('/', [UsersController::class, 'index'])->name('add.page');
Route::post('/add', [UsersController::class, 'addUser'])->name('add.user');
Route::get('/list', [UsersController::class, 'listuser'])->name('list.user');
Route::get('/views/{id}', [UsersController::class, 'show'])->name('user.view');
Route::get('/edit/{id}', [UsersController::class, 'edituser'])->name('user.edit');
Route::post('/update', [UsersController::class, 'updateuser'])->name('user.update');
Route::get('/delete/{id}', [UsersController::class, 'deleteuser'])->name('user.delete');
Route::post('/cstatus', [UsersController::class, 'changestatus'])->name('change.user.status');






