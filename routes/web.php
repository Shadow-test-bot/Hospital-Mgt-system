<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
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


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::middleware('auth')->get('/appointment', [HomeController::class, 'showAppointmentForm']);

Route::middleware('auth')->post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointments', [HomeController::class, 'myappointments']);

Route::get('/doctors', [HomeController::class, 'doctors']);

Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);

Route::get('/showappointments', [AdminController::class, 'showappointments']);

Route::get('/approve/{id}', [AdminController::class, 'approve']);

Route::get('/cancel/{id}', [AdminController::class, 'cancel']);

Route::get('/showdoctors', [AdminController::class, 'showdoctors']);

Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);

Route::get('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);

Route::post('/editdoctor/{id}', [AdminController::class, 'editdoctor']);

Route::get('/emailview/{id}', [AdminController::class, 'emailview']);

Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);

Route::get('/doctor_view', [HomeController::class, 'doctor_view']);

Route::get('/doctor/{id}', [HomeController::class, 'doctor_detail']);

Route::get('/news', [HomeController::class, 'news']);

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/doctor/dashboard', [App\Http\Controllers\DoctorController::class, 'dashboard']);
    Route::get('/doctor/patients', [App\Http\Controllers\DoctorController::class, 'patients']);
    Route::get('/doctor/schedule', [App\Http\Controllers\DoctorController::class, 'schedule']);
    Route::post('/doctor/schedule', [App\Http\Controllers\DoctorController::class, 'updateSchedule']);
});
    
    Route::middleware(['auth', 'role:1'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/admin/departments', [AdminController::class, 'showdepartments']);
        Route::get('/admin/add_department', [AdminController::class, 'adddepartmentview']);
        Route::post('/admin/add_department', [AdminController::class, 'adddepartment']);
        Route::get('/admin/department/{id}/edit', [AdminController::class, 'editdepartmentview']);
        Route::post('/admin/department/{id}/edit', [AdminController::class, 'editdepartment']);
        Route::get('/admin/department/{id}/delete', [AdminController::class, 'deletedepartment']);
    
        Route::get('/admin/users', [AdminController::class, 'showusers']);
        Route::get('/admin/user/{id}/activate', [AdminController::class, 'activateuser']);
        Route::get('/admin/user/{id}/deactivate', [AdminController::class, 'deactivateuser']);
    });