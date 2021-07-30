<?php

use App\Http\Controllers\Admin\EventAttendeeController;
use App\Http\Controllers\Admin\EventController;
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
    return true;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(["auth:web"])->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::resource('events', EventController::class);
        Route::resource('{event}/attendees', EventAttendeeController::class);
    });
});
