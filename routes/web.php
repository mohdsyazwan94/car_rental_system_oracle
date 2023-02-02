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

Route::resource('rooms', App\Http\Controllers\Admin\RoomController::class);
Route::resource('roomTypes', App\Http\Controllers\Admin\RoomTypeController::class);

Route::resource('reservations', App\Http\Controllers\Admin\ReservationController::class);
Route::post('/reservations/{reservation}/checkin', [App\Http\Controllers\Admin\ReservationController::class, 'checkin'])->name('reservations.checkin');
Route::post('/reservations/{reservation}/checkout', [App\Http\Controllers\Admin\ReservationController::class, 'checkout'])->name('reservations.checkout');