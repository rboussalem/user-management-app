<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
    return view('pages.welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/guestpage', [PageController::class, 'guestpage'])->name('guestpage');
Route::get('/userpage', [PageController::class, 'userpage'])->name('userpage');
Route::get('/adminpage', [PageController::class, 'adminpage'])->name('adminpage');


//Route::resource('users', UserController::class);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/roles', [UserController::class, 'roles'])->name('users.roles');
Route::put('/users/{user}/{role}', [UserController::class, 'updateroles'])->name('users.updateroles');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{user}/show', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{role}', [UserController::class, 'sortbyrole'])->name('users.sortbyrole');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');