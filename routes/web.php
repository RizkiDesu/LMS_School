<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;

Route::get('/',[AuthController::class, 'login']);
Route::post('/login',[AuthController::class, 'authlogin']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/forgot-pasword',[AuthController::class, 'forgotpassword']);
Route::post('/forgot-pasword',[AuthController::class, 'PostForgotPassword']);
Route::get('/reset/{token}',[AuthController::class, 'reset']);
Route::post('/reset/{token}',[AuthController::class, 'Postreset']);




Route::group(['middelware' => 'admin'], function(){
    //admin
    Route::get('admin/dashboard',[DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list',[AdminController::class, 'list']);
    Route::get('admin/admin/add',[AdminController::class, 'add']);
    Route::post('admin/admin/add',[AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}',[AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}',[AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}',[AdminController::class, 'delete']);

    // student
    Route::get('admin/student/list',[StudentController::class, 'list']);
    Route::get('admin/student/add',[StudentController::class, 'add']);
    Route::post('admin/student/add',[StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}',[StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}',[StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}',[StudentController::class, 'delete']);


    // admin/parent

    Route::get('admin/parent/list',[ParentController::class, 'list']);
    Route::get('admin/parent/add',[ParentController::class, 'add']);
    Route::post('admin/parent/add',[ParentController::class, 'insert']);
    Route::get('admin/parent/edit/{id}',[ParentController::class, 'edit']);
    Route::post('admin/parent/edit/{id}',[ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}',[ParentController::class, 'delete']);
    Route::get('admin/parent/my-student/{id}',[ParentController::class, 'myStudentent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}',[ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}',[ParentController::class, 'AssignStudentParentDelete']);
    






    //class url
    Route::get('admin/class/list',[ClassController::class, 'list']);
    Route::get('admin/class/add',[ClassController::class, 'add']);
    Route::post('admin/class/add',[ClassController::class, 'insert']);
    Route::get('admin/class/edit/{id}',[ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}',[ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}',[ClassController::class, 'delete']);


    //subject url admin/subject/list
    Route::get('admin/subject/list',[SubjectController::class, 'list']);
    Route::get('admin/subject/add',[SubjectController::class, 'add']);
    Route::post('admin/subject/add',[SubjectController::class, 'insert']);
    Route::get('admin/subject/edit/{id}',[SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}',[SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}',[SubjectController::class, 'delete']);

    //assign_subject
    Route::get('admin/assign_subject/list',[ClassSubjectController::class, 'list']);
    Route::get('admin/assign_subject/add',[ClassSubjectController::class, 'add']);
    Route::post('admin/assign_subject/add',[ClassSubjectController::class, 'insert']);
    Route::get('admin/assign_subject/edit/{id}',[ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}',[ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}',[ClassSubjectController::class, 'delete']);
    Route::get('admin/assign_subject/edit_single/{id}',[ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}',[ClassSubjectController::class, 'update_single']);


    //admin/change-password
    Route::get('admin/change-password',[UserController::class, 'change_password']);
    Route::post('admin/change-password',[UserController::class, 'update_change_password']);

});

Route::group(['middelware' => 'teacher'], function(){
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);


    Route::get('teacher/change-password',[UserController::class, 'change_password']);
    Route::post('teacher/change-password',[UserController::class, 'update_change_password']);
});

Route::group(['middelware' => 'student'], function(){
    Route::get('student/dashboard',  [DashboardController::class, 'dashboard']);

    Route::get('student/change-password',[UserController::class, 'change_password']);
    Route::post('student/change-password',[UserController::class, 'update_change_password']);
});

Route::group(['middelware' => 'parent'], function(){
    Route::get('parent/dashboard',  [DashboardController::class, 'dashboard']);

    Route::get('parent/change-password',[UserController::class, 'change_password']);
    Route::post('parent/change-password',[UserController::class, 'update_change_password']);
});
