<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BloodGroupController;
use App\Http\Controllers\Backend\Result\ResultPublisherController;
use App\Http\Controllers\Backend\Result\ResultUplodeController;
use App\Http\Controllers\Backend\Routine\RoutineController;
use App\Http\Controllers\Backend\Teacher\TeachersController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Result\CtResultController;
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


    // *** BLOOD GROUP
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
    Route::get('teacher-list', [TeachersController::class, 'TeacherList'])->name('teacher.list')->middleware('admin');
    Route::get('teacher-edit/{id}', [TeachersController::class, 'TeacherEdit'])->name('teacher.edit')->middleware('admin');
    Route::put('teacher-edit-data/{id}', [TeachersController::class, 'TeacherEditData'])->name('teacher.edit.data')->middleware('admin');
    Route::get('teacher-delete/{id}', [TeachersController::class, 'TeacherDelete'])->name('teacher.delete')->middleware('admin');

    
    // ** ROUTINE
    Route::get('add-routine', [RoutineController::class, 'addRoutine'])->name('add.routine')->middleware('admin');
    Route::post('insert-routine', [RoutineController::class, 'indertRoutine'])->name('insert.routine')->middleware('admin');
    Route::get('list-routine', [RoutineController::class, 'listRoutine'])->name('list.routine')->middleware('admin');
    Route::get('update-routine-path/{id}', [RoutineController::class, 'updateRoutinePath'])->name('upated.routine.path')->middleware('admin');
    Route::put('update-routine/{id}', [RoutineController::class, 'updateRoutine'])->name('upated.routine')->middleware('admin');
    Route::get('delete-routine/{id}', [RoutineController::class, 'deleteRoutine'])->name('delete.routine')->middleware('admin');


    // ** RESULT 
    Route::get('add-new-subject', [ResultPublisherController::class, 'addNewSubject'])->name('add.subject')->middleware('admin');
    Route::post('insert-subject-data', [ResultPublisherController::class, 'insertSubjectData'])->name('insert.subject')->middleware('admin');
    Route::get('subject-list', [ResultPublisherController::class, 'subjectList'])->name('subject.list')->middleware('admin');
    Route::get('subject-edit{id}', [ResultPublisherController::class, 'subjectEdit'])->name('subject.edit')->middleware('admin');
    Route::put('subject-update{id}', [ResultPublisherController::class, 'subjectUpdate'])->name('subject.update')->middleware('admin');
    Route::get('subject-search', [ResultPublisherController::class, 'subjectSearch'])->name('subject.search')->middleware('admin');
    Route::get('delete-subject/{id}', [ResultPublisherController::class, 'deleteSubject'])->name('delete.subject')->middleware('admin');
    
    // **RESULT UPLOAD
    Route::get('upload-result', [ResultUplodeController::class, 'uploadResult'])->name('upload.result')->middleware('admin');
    Route::get('select-subject', [ResultUplodeController::class, 'selectSubject'])->name('select.subject')->middleware('admin');
    Route::post('insert-results', [ResultUplodeController::class, 'insertResult'])->name('insert.result')->middleware('admin');
});
/**
 * /****ADMIN ROUTE END
 */

// Route::get('/', function () {
//     return view('index');
// });

// ***FRONT END START 

// *HOME DETAILS
  Route::get('/', [HomeController::class, 'home'])->name('index');
  Route::prefix('ete-dept-faculty-profile')->group(function(){
      Route::get('/{id}', [HomeController::class, 'homeEdit'])->name('index.details');
  });



  // *FRONTEND ABOUT DEPARTMENT 
  Route::prefix('ete-department')->group(function(){
    Route::get('/about', [AboutController::class, 'aboutEte'])->name('about.index');
  });

  // ** RESULT 
  Route::prefix('result')->group(function(){
    Route::get('/semester', [CtResultController::class, 'resultSemester'])->name('resultsemester.index');
    Route::get('/subject/{id}', [CtResultController::class, 'resultSubject'])->name('resultsubject.index');
  });

// ***FRONT END END 












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';