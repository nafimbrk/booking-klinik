<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return inertia('Home');
});

Route::resource('doctors', DoctorController::class);
Route::resource('schedules', ScheduleController::class);
// Route::resource('bookings', BookingController::class);
