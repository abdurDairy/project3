<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BloodGroupController;
use App\Http\Controllers\Backend\Teacher\TeachersController;
use App\Http\Controllers\ProfileController;
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

/**
 * /****ADMIN ROUTE SATART 
 */
Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class, 'Index'])->name('login.form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashbord',[AdminController::class, 'Dashbord'])->name('admin.dashbord')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register',[AdminController::class, 'Register'])->name('admin.register')->middleware('admin');
    Route::post('/register/create',[AdminController::class, 'RegisterCreate'])->name('admin.register.create')->middleware('admin');


    // *** BLOO GROUP
    Route::get('blood-group-form', [BloodGroupController::class, 'bloodInfoIndex'])->name('blood.index')->middleware('admin');
    Route::post('inert-blood', [BloodGroupController::class, 'InsertBlood'])->name('insert.blood')->middleware('admin');
    Route::get('blood-group-list', [BloodGroupController::class, 'bloodList'])->name('blood.list')->middleware('admin');
    Route::get('blood-group-detail/{id}', [BloodGroupController::class, 'bloodDetail'])->name('blood.detail');
    Route::get('blood-group-edit/{id}', [BloodGroupController::class, 'editBloodGroup'])->name('edit.blood.group')->middleware('admin');
    Route::put('blood-group-edit-data/{id}', [BloodGroupController::class, 'editBloodGroupData'])->name('edit.blood.group.data')->middleware('admin');
    Route::get('blood-group-delete/{id}', [BloodGroupController::class, 'BloodGroupDelete'])->name('bloodGroup.delete')->middleware('admin');



    // ** TEACHER PROFILE 
    Route::get('add-new-teacher', [TeachersController::class, 'addTeacher'])->name('add.teacher')->middleware('admin');
    Route::post('insert-teacher-data', [TeachersController::class, 'insertTeacherData'])->name('insert.teacher.data')->middleware('admin');

});
/**
 * /****ADMIN ROUTE END
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';