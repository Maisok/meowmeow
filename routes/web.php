<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialistController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\ServiceIndexController;
use App\Http\Controllers\SpecialistIndexController;
use App\Http\Controllers\StaffIndexController;
use App\Http\Controllers\NewAppointmentController;
use App\Http\Controllers\ExportController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/showservices', [ServiceIndexController::class, 'index'])->name('services');
Route::get('/showservices/{service}', [ServiceIndexController::class, 'show'])->name('services.show');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/showspecialists', [SpecialistIndexController::class, 'index'])->name('specialists');
Route::get('/showspecialists/{specialist}', [SpecialistIndexController::class, 'show'])->name('specialists.show');
Route::get('/staff/{staff}', [StaffIndexController::class, 'show'])->name('staff.show');


Route::middleware('auth')->group(function () {

    Route::get('/export/appointments', [ExportController::class, 'exportAppointments'])->name('export.appointments');
    Route::get('/export/new-appointments', [ExportController::class, 'exportNewAppointments'])->name('export.new-appointments');

    Route::post('/services/{service}/appointment', [ServiceIndexController::class, 'storeAppointment'])->name('appointment.store');


    Route::get('/export/appointments', [ExportController::class, 'exportAppointments'])->name('export.appointments');


    Route::get('/staff/{staff}/appointment', [NewAppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/staff/{staff}/appointment', [NewAppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/admin/specialists', [SpecialistController::class, 'index'])->name('admin.specialists.index');
    Route::get('/admin/specialists/create', [SpecialistController::class, 'create'])->name('admin.specialists.create');
    Route::post('/admin/specialists', [SpecialistController::class, 'store'])->name('admin.specialists.store');
    Route::get('/admin/specialists/{specialist}/edit', [SpecialistController::class, 'edit'])->name('admin.specialists.edit');
    Route::put('/admin/specialists/{specialist}', [SpecialistController::class, 'update'])->name('admin.specialists.update');
    Route::delete('/admin/specialists/{specialist}', [SpecialistController::class, 'destroy'])->name('admin.specialists.destroy');

    Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/admin/staff', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/admin/staff/{staff}/edit', [StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::put('/admin/staff/{staff}', [StaffController::class, 'update'])->name('admin.staff.update');
    Route::delete('/admin/staff/{staff}', [StaffController::class, 'destroy'])->name('admin.staff.destroy');

});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});






