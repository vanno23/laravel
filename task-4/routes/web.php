<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrimeNumberController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\ContactFormController;

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



Route::post('/register', [UserRegistrationController::class, 'register']);


Route::prefix('contact')->group(function () {
    Route::get('/', [ContactFormController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactFormController::class, 'store'])->name('contact.store');
});