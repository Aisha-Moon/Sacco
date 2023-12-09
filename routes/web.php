<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanTypesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LoanPlanController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanUserController;

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

Route::get('/',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::get('/forgot',[AuthController::class,'forgot']);
Route::post('/register_post',[AuthController::class,'register_post']);
Route::post('/login_post',[AuthController::class,'login_post']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index']);
    Route::get('admin/staff/list',[StaffController::class,'index']);
    Route::get('admin/staff/add',[StaffController::class,'add']);
    Route::post('admin/staff/add',[StaffController::class,'add_staff']);
    Route::get('admin/staff/edit/{id}',[StaffController::class,'edit_staff']);
    Route::post('admin/staff/edit/{id}',[StaffController::class,'update_staff']);
    Route::get('admin/staff/delete/{id}',[StaffController::class,'delete_staff']);
    // loan types
    Route::get('/admin/loan_types/list',[LoanTypesController::class,'index']);
    Route::get('/admin/loan_types/add',[LoanTypesController::class,'add']);
    Route::post('/admin/loan_types/add',[LoanTypesController::class,'store_loan']);
    Route::get('admin/loan_types/edit/{id}',[LoanTypesController::class,'edit_loan_type']);
    Route::post('admin/loan_types/edit/{id}',[LoanTypesController::class,'update_loan_type']);
    Route::get('admin/loan_types/delete/{id}',[LoanTypesController::class,'delete_loan_type']);
    //loan plans
    Route::get('/admin/loan_plan/list',[LoanPlanController::class,'index']);
    Route::get('/admin/loan_plan/add',[LoanPlanController::class,'add']);
    Route::post('/admin/loan_plan/add',[LoanPlanController::class,'store']);
    Route::get('/admin/loan_plan/edit/{id}',[LoanPlanController::class,'edit']);
    Route::post('/admin/loan_plan/edit/{id}',[LoanPlanController::class,'update']);
    Route::get('/admin/loan_plan/delete/{id}',[LoanPlanController::class,'delete']);
    //loan types
    Route::get('/admin/loan/list',[LoanController::class,'index']);
    Route::get('/admin/loan/add',[LoanController::class,'create']);
    Route::post('/admin/loan/add',[LoanController::class,'store']);
    Route::get('/admin/loan/edit/{id}',[LoanController::class,'edit']);
    Route::post('/admin/loan/edit/{id}',[LoanController::class,'update']);
    Route::get('/admin/loan/delete/{id}',[LoanController::class,'destroy']);
    //loan user
    Route::get('/admin/loan_user/list',[LoanUserController::class,'index']);
    Route::get('/admin/loan_user/add',[LoanUserController::class,'create']);
    Route::post('/admin/loan_user/add',[LoanUserController::class,'store']);
    Route::get('/admin/loan_user/delete/{id}',[LoanUserController::class,'destroy']);


});
Route::group(['middleware'=>'staff'],function(){
    Route::get('/staff/dashboard',[DashboardController::class,'index']);

});

Route::get('/logout',[AuthController::class,'logout']);

