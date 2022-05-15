<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;



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

 
//Setups prefix 

Route::prefix('setups')->group(function(){

    //Start student class routes

    Route::get('student/class/view', [StudentClassController::class, 'viewStudentClass'])->name('student.class.view');
    Route::get('student/class/add/view', [StudentClassController::class, 'viewAddStudentClass'])->name('add.student.class.view');
    Route::post('student/class/add', [StudentClassController::class, 'addStudentClass'])->name('student.class.add');
    
    Route::get('/student/class/delete/{id}', [StudentClassController::class, 'classDelete'])->name('student.class.delete');

    Route::get('/student/class/edit/{id}', [StudentClassController::class , 'classEdit'])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class, 'classUpdate'])->name('student.class.update');

//End student class routes

//Start student year routes
Route::get('student/year/view', [StudentYearController::class, 'viewYear'])->name('student.year.view');
Route::get('student/year/add', [StudentYearController::class, 'viewAddStudentYear'])->name('student.year.add');
Route::post('student/year/store', [StudentYearController::class, 'storeStudentYear'])->name('student.year.store');

Route::get('/student/year/delete/{id}', [StudentYearController::class, 'deleteYear'])->name('student.year.delete');
Route::get('/student/year/edit/{id}', [StudentYearController::class, 'yearEdit'])->name('student.year.edit');

Route::post('student/year/update/{id}', [StudentYearController::class, 'updateStudentYear'])->name('student.year.update');


//End student class routes

//Start student group routes
Route::get('student/group/view', [StudentGroupController::class, 'viewGroupList'])->name('student.group.view');
Route::get('student/group/add', [StudentGroupController::class, 'addGroup'])->name('student.group.add');

Route::post('student/group/store', [StudentGroupController::class, 'storeGroup'])->name('student.group.store');

Route::get('student/group/delete/{id}', [StudentGroupController::class, 'deleteGroup'])->name('student.group.delete');
Route::get('student/group/edit/{id}', [StudentGroupController::class, 'editGroup'])->name('student.group.edit');

Route::post('student/group/update/{id}', [StudentGroupController::class, 'updateGroup'])->name('student.group.update');

//End student group routes

});

 