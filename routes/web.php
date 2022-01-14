<?php

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
Route::get('admin/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
Route::get('admin/appointments', \App\Http\Livewire\Admin\Appointments\ListAppointments::class)->name('admin.appointments');
Route::get('admin/users', App\Http\Livewire\Admin\Users\ListUsers::class)->name('admin.users');
Route::get('admin/settings', \App\Http\Controllers\Admin\DashboardController::class)->name('admin.settings');

