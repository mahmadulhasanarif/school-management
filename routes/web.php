<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeCategoryAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegisterController;
use App\Http\Controllers\Backend\Student\StudentRollGenerateController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
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

Route::get('/', function () {
    return view('admin.auth.login');
});

Route::group(['prefix' => 'user','middleware' => ['auth:web'], 'as'=>'user.'], function () {

    // Dashboard Route
    Route::get('dashboard', [UserProfileController::class, 'dashboard'])->name('dashboard');

    // profile
    Route::get('profile/edit', [UserProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile/update', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/password/update', [UserProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('status/update/{user}', [UserProfileController::class, 'status'])->name('profile.status');

});

require __DIR__.'/auth.php';


// Admin Route Start

Route::group(['prefix' => 'admin','middleware' => ['auth:admin'], 'as'=>'admin.'], function(){
    // profile Route
    Route::get('profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('status/update/{admin}', [ProfileController::class, 'status'])->name('profile.status');

    // Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

     // Admin and User Route
     Route::get('user/index', [AdminController::class, 'index'])->name('user.index');
     Route::get('user/create', [AdminController::class, 'create'])->name('user.create');
     Route::post('user/store', [AdminController::class, 'store'])->name('user.store');
     Route::get('user/edit/{id}', [AdminController::class, 'edit'])->name('user.edit');
     Route::post('user/update/{id}', [AdminController::class, 'update'])->name('user.update');
     Route::post('user/password/{id}', [AdminController::class, 'updatePassword'])->name('user.password.update');
     Route::get('user/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

     
    // Role Permission route
    Route::get('role/index', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

});

require __DIR__.'/adminAuth.php';



Route::group(['prefix' => 'setup/','middleware' => ['auth:admin'], 'as'=>'setup.'], function(){
    // Student Class Setup
    Route::get('class/index', [StudentClassController::class, 'index'])->name('class.index');
    Route::get('class/create', [StudentClassController::class, 'create'])->name('class.create');
    Route::post('class/store', [StudentClassController::class, 'store'])->name('class.store');
    Route::get('class/edit/{id}', [StudentClassController::class, 'edit'])->name('class.edit');
    Route::post('class/update/{id}', [StudentClassController::class, 'update'])->name('class.update');
    Route::get('class/delete/{id}', [StudentClassController::class, 'delete'])->name('class.delete');

    // Student Year Setup
    Route::get('year/index', [StudentYearController::class, 'index'])->name('year.index');
    Route::get('year/create', [StudentYearController::class, 'create'])->name('year.create');
    Route::post('year/store', [StudentYearController::class, 'store'])->name('year.store');
    Route::get('year/edit/{id}', [StudentYearController::class, 'edit'])->name('year.edit');
    Route::post('year/update/{id}', [StudentYearController::class, 'update'])->name('year.update');
    Route::get('year/delete/{id}', [StudentYearController::class, 'delete'])->name('year.delete');

    // Student Group Setup
    Route::get('group/index', [StudentGroupController::class, 'index'])->name('group.index');
    Route::get('group/create', [StudentGroupController::class, 'create'])->name('group.create');
    Route::post('group/store', [StudentGroupController::class, 'store'])->name('group.store');
    Route::get('group/edit/{id}', [StudentGroupController::class, 'edit'])->name('group.edit');
    Route::post('group/update/{id}', [StudentGroupController::class, 'update'])->name('group.update');
    Route::get('group/delete/{id}', [StudentGroupController::class, 'delete'])->name('group.delete');
    
    // Student Shift Setup
    Route::get('shift/index', [StudentShiftController::class, 'index'])->name('shift.index');
    Route::get('shift/create', [StudentShiftController::class, 'create'])->name('shift.create');
    Route::post('shift/store', [StudentShiftController::class, 'store'])->name('shift.store');
    Route::get('shift/edit/{id}', [StudentShiftController::class, 'edit'])->name('shift.edit');
    Route::post('shift/update/{id}', [StudentShiftController::class, 'update'])->name('shift.update');
    Route::get('shift/delete/{id}', [StudentShiftController::class, 'delete'])->name('shift.delete');
    
    // Student Fee category Setup
    Route::get('fee_category/index', [FeeCategoryController::class, 'index'])->name('fee_category.index');
    Route::get('fee_category/create', [FeeCategoryController::class, 'create'])->name('fee_category.create');
    Route::post('fee_category/store', [FeeCategoryController::class, 'store'])->name('fee_category.store');
    Route::get('fee_category/edit/{id}', [FeeCategoryController::class, 'edit'])->name('fee_category.edit');
    Route::post('fee_category/update/{id}', [FeeCategoryController::class, 'update'])->name('fee_category.update');
    Route::get('fee_category/delete/{id}', [FeeCategoryController::class, 'delete'])->name('fee_category.delete');

    // Student Fee Category Amount Setup
    Route::get('fee_category_amount/index', [FeeCategoryAmountController::class, 'index'])->name('fee_category_amount.index');
    Route::get('fee_category_amount/create', [FeeCategoryAmountController::class, 'create'])->name('fee_category_amount.create');
    Route::post('fee_category_amount/store', [FeeCategoryAmountController::class, 'store'])->name('fee_category_amount.store');
    Route::get('fee_category_amount/edit/{fee_category_id}', [FeeCategoryAmountController::class, 'edit'])->name('fee_category_amount.edit');
    Route::post('fee_category_amount/update/{fee_category_id}', [FeeCategoryAmountController::class, 'update'])->name('fee_category_amount.update');
    Route::get('fee_category_amount/details/{fee_category_id}', [FeeCategoryAmountController::class, 'details'])->name('fee_category_amount.details');

    // Student Exam Type Setup
    Route::get('exam_type/index', [ExamTypeController::class, 'index'])->name('exam_type.index');
    Route::get('exam_type/create', [ExamTypeController::class, 'create'])->name('exam_type.create');
    Route::post('exam_type/store', [ExamTypeController::class, 'store'])->name('exam_type.store');
    Route::get('exam_type/edit/{id}', [ExamTypeController::class, 'edit'])->name('exam_type.edit');
    Route::post('exam_type/update/{id}', [ExamTypeController::class, 'update'])->name('exam_type.update');
    Route::get('exam_type/delete/{id}', [ExamTypeController::class, 'delete'])->name('exam_type.delete');

    // School Subject Type Setup
    Route::get('school_subject/index', [SchoolSubjectController::class, 'index'])->name('school_subject.index');
    Route::get('school_subject/create', [SchoolSubjectController::class, 'create'])->name('school_subject.create');
    Route::post('school_subject/store', [SchoolSubjectController::class, 'store'])->name('school_subject.store');
    Route::get('school_subject/edit/{id}', [SchoolSubjectController::class, 'edit'])->name('school_subject.edit');
    Route::post('school_subject/update/{id}', [SchoolSubjectController::class, 'update'])->name('school_subject.update');
    Route::get('school_subject/delete/{id}', [SchoolSubjectController::class, 'delete'])->name('school_subject.delete');

    // Assign Subject Type Setup
    Route::get('assign_subject/index', [AssignSubjectController::class, 'index'])->name('assign_subject.index');
    Route::get('assign_subject/create', [AssignSubjectController::class, 'create'])->name('assign_subject.create');
    Route::post('assign_subject/store', [AssignSubjectController::class, 'store'])->name('assign_subject.store');
    Route::get('assign_subject/edit/{class_id}', [AssignSubjectController::class, 'edit'])->name('assign_subject.edit');
    Route::post('assign_subject/update/{class_id}', [AssignSubjectController::class, 'update'])->name('assign_subject.update');
    Route::get('assign_subject/delete/{class_id}', [AssignSubjectController::class, 'details'])->name('assign_subject.details');

    // Designation Setup
    Route::get('designation/index', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::post('designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
});


// Student Route
Route::group(['prefix' => 'student/','middleware' => ['auth:admin'], 'as'=>'student.'], function(){
    // Student Registration route
    Route::get('registration/index', [StudentRegisterController::class, 'index'])->name('registration.index');
    Route::get('registration/create', [StudentRegisterController::class, 'create'])->name('registration.create');
    Route::post('registration/store', [StudentRegisterController::class, 'store'])->name('registration.store');
    Route::get('registration/edit/{student_id}', [StudentRegisterController::class, 'edit'])->name('registration.edit');
    Route::post('registration/update/{student_id}', [StudentRegisterController::class, 'update'])->name('registration.update');
    Route::get('registration/promotion/{student_id}', [StudentRegisterController::class, 'studentPromotion'])->name('registration.promotion');
    Route::post('registration/promotion/{student_id}', [StudentRegisterController::class, 'studentRegistrationPromotion'])->name('registration.promote');
    
    // Student Search Class and Year wise Data Get
    Route::get('search/class/year/wise', [StudentRegisterController::class, 'searchClassYear'])->name('search.class.year');
    Route::get('registration/details/{student_id}', [StudentRegisterController::class, 'DetailsPDF'])->name('registration.details');

    // Student Roll Generate Route
    Route::get('/roll/generate/index', [StudentRollGenerateController::class, 'StudentRollView'])->name('roll.generate.index');
    Route::get('/registration/getstudents', [StudentRollGenerateController::class, 'GetStudents'])->name('registration.getstudents');
    Route::post('/roll/generate/store', [StudentRollGenerateController::class, 'StudentRollStore'])->name('roll.generate.store');

    // Student Registration Fee Route
    Route::get('registration/fee', [RegistrationFeeController::class, 'index'])->name('registration.fee');
    Route::get('registration/fee/classWise', [RegistrationFeeController::class, 'RegFeeClassData'])->name('registration.fee.classwise');
    Route::post('registration/fee/store', [RegistrationFeeController::class, 'store'])->name('registration.fee.store');
});