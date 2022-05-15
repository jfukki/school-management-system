<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return view('admin.index');

    })->name('dashboard');
});


Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// User management routes

Route::prefix('users')->group(function(){

    Route::get('/view', [UserController::class, 'userview'])->name('user.view');

    Route::get('/add', [UserController::class, 'useradd'])->name('user.add');

    Route::post('/store', [UserController::class, 'userstore'])->name('user.store');

    Route::get('/edit/{id}', [UserController::class , 'useredit'])->name('user.edit');

    Route::post('/update/{id}', [UserController::class, 'userupdate'])->name('user.update');

    Route::get('/delete/{id}', [UserController::class, 'userdelete'])->name('user.delete');


});

//user profile 

Route::prefix('profile')->group(function(){

    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/update', [ProfileController::class, 'profileUpdate'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');


});

 