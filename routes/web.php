<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\Setup\AssignSubjectController;
use App\Http\Controllers\backend\Setup\DesignationController;
use App\Http\Controllers\backend\Setup\ExamTypeController;
use App\Http\Controllers\backend\setup\FeeCategoryAmountController;
use App\Http\Controllers\backend\Setup\FeeCategoryController;
use App\Http\Controllers\backend\Setup\SchoolSubjectController;
use App\Http\Controllers\backend\Setup\StudentClassController;
use App\Http\Controllers\backend\Setup\StudentGroupController;
use App\Http\Controllers\backend\Setup\StudentShiftController;
use App\Http\Controllers\backend\Setup\StudentYearController;
use App\Http\Controllers\backend\Student\StudentRegistrationController;
use App\Http\Controllers\backend\UserController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::prefix('user')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/create', [UserController::class, 'UserCreate'])->name('user.create');
    Route::post('/store', [UserController::class, 'UserStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
});
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});
Route::prefix('setup')->group(function(){
    // Student Class Routes
    Route::get('student/class/view', [StudentClassController::class, 'StudentClassView'])->name('student.class.view');
    Route::get('student/class/create', [StudentClassController::class, 'StudentClassCreate'])->name('student.class.create');
    Route::post('student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

    // Student Year Routes
    Route::get('student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
    Route::get('student/year/create', [StudentYearController::class, 'StudentYearCreate'])->name('student.year.create');
    Route::post('student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

    // Student Group Routes
    Route::get('student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
    Route::get('student/group/create', [StudentGroupController::class, 'StudentGroupCreate'])->name('student.group.create');
    Route::post('student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');
    // Student Shift Routes
    Route::get('student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
    Route::get('student/shift/create', [StudentShiftController::class, 'StudentShiftCreate'])->name('student.shift.create');
    Route::post('student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');
    // Fee Category Routes
    Route::get('fee/category/view', [FeeCategoryController::class, 'FeeCategoryView'])->name('fee.category.view');
    Route::get('fee/category/create', [FeeCategoryController::class, 'FeeCategoryCreate'])->name('fee.category.create');
    Route::post('fee/category/store', [FeeCategoryController::class, 'FeeCategoryStore'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');
    // Fee Amount Routes
    Route::get('fee/amount/view', [FeeCategoryAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/create', [FeeCategoryAmountController::class, 'CreateFeeAmount'])->name('fee.amount.create');
    Route::post('fee/amount/store', [FeeCategoryAmountController::class, 'StoreFeeAmount'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{fee_category_id}', [FeeCategoryAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{fee_category_id}', [FeeCategoryAmountController::class, 'UpdateFeeAmount'])->name('fee.amount.update');
    Route::get('fee/amount/details/{fee_category_id}', [FeeCategoryAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');
    Route::get('fee/amount/delete/{fee_category_id}', [FeeCategoryAmountController::class, 'DeleteFeeAmount'])->name('fee.amount.delete');
    // Exam Type Routes
    Route::get('exam/type/view', [ExamTypeController::class, 'ExamTypeView'])->name('exam.type.view');
    Route::get('exam/type/create', [ExamTypeController::class, 'ExamTypeCreate'])->name('exam.type.create');
    Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');
    //Subject Routes
    Route::get('subject/view', [SchoolSubjectController::class, 'SubjectView'])->name('subject.view');
    Route::get('subject/create', [SchoolSubjectController::class, 'SubjectCreate'])->name('subject.create');
    Route::post('subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('subject.store');
    Route::get('subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('subject.edit');
    Route::post('subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('subject.update');
    Route::get('subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('subject.delete');
    //Assign Subject Routes
    Route::get('assign/subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');
    Route::get('assign/subject/create', [AssignSubjectController::class, 'AssignSubjectCreate'])->name('assign.subject.create');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');
    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'AssignSubjectDetail'])->name('assign.subject.details');
    Route::get('assign/subject/delete/{class_id}', [AssignSubjectController::class, 'AssignSubjectDelete'])->name('assign.subject.delete');
    //Designation Routes
    Route::get('designation/view', [DesignationController::class, 'DesignationView'])->name('designation.view');
    Route::get('designation/create', [DesignationController::class, 'DesignationCreate'])->name('designation.create');
    Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');
    Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
});
Route::prefix('student')->group(function(){
    //Student Registration Routes
    Route::get('registration/view', [StudentRegistrationController::class, 'StudentRegistrationView'])->name('student.registration.view');

});

