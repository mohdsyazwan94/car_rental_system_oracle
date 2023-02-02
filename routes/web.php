<?php

use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'homepage')->name('index');
Route::view('/admin', 'login_admin');

Auth::routes();

Route::get('/reservation', [App\Http\Controllers\HomeController::class, 'checkReservation'])->name('checkReservation');
Route::get('/confirmReservation', [App\Http\Controllers\HomeController::class, 'confirmReservation'])->name('confirmReservation');
Route::post('/createReservation', [App\Http\Controllers\HomeController::class, 'createReservation'])->name('createReservation');

Route::middleware(['auth'])->group(function () {
    Route::resource('home', App\Http\Controllers\HomeController::class);
});

require __DIR__.'/auth.php';

Route::fallback( function () {
    abort( 404 );
} );

// Route::middleware(['middleware' => 'role:admin'])->group(function () {
    
// });

Route::resource('users', App\Http\Controllers\Admin\UserController::class);
Route::post('/users/{user}/activate', [App\Http\Controllers\Admin\UserController::class, 'activate'])->name('users.activate');
Route::post('/users/{user}/deactivate', [App\Http\Controllers\Admin\UserController::class, 'deactivate'])->name('users.deactivate');

Route::resource('students', App\Http\Controllers\Admin\StudentController::class);
Route::post('/students/{student}/activate', [App\Http\Controllers\Admin\StudentController::class, 'activate'])->name('students.activate');
Route::post('/students/{student}/deactivate', [App\Http\Controllers\Admin\StudentController::class, 'deactivate'])->name('students.deactivate');

Route::resource('vehicles', App\Http\Controllers\Admin\VehicleController::class);
//Route::resource('roomTypes', App\Http\Controllers\Admin\RoomTypeController::class);

Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class);
Route::post('/bookings/{booking}/checkin', [App\Http\Controllers\Admin\BookingController::class, 'checkin'])->name('bookings.checkin');
Route::post('/bookings/{booking}/checkout', [App\Http\Controllers\Admin\BookingController::class, 'checkout'])->name('bookings.checkout');