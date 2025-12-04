<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\DoctorController;
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
    return redirect('/login');
});

Route::get('/home', [HomeController::class, 'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

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

Route::get('/news', [HomeController::class, 'news']);

Route::get('/notifications', [HomeController::class, 'notifications']);

Route::get('/notification/read/{id}', [HomeController::class, 'markNotificationRead']);

Route::get('/doctor/appointments', [DoctorController::class, 'appointments']);
Route::get('/doctor/user-schedule', [DoctorController::class, 'userSchedule']);
Route::post('/doctor/user-schedule', [DoctorController::class, 'storeUserSchedule']);
Route::get('/doctor/doctor-schedule', [DoctorController::class, 'doctorSchedule']);
Route::post('/doctor/doctor-schedule', [DoctorController::class, 'updateDoctorSchedule']);

Route::get('/doctor/{id}', [HomeController::class, 'doctor_detail']);


    Route::middleware(['auth', 'role:1'])->group(function () {
        Route::get('/admin/departments', [AdminController::class, 'showdepartments']);
        Route::post('/admin/departments', [AdminController::class, 'adddepartment']);
        Route::post('/admin/departments/{id}', [AdminController::class, 'editdepartment']);
        Route::delete('/admin/departments/{id}', [AdminController::class, 'deletedepartment']);
        Route::get('/admin/schedules', [AdminController::class, 'showschedules']);
        Route::post('/admin/schedules/{id}', [AdminController::class, 'updateschedule']);
    });