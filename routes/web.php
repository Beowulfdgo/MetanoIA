<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\Api\SearchController;

Route::middleware(['auth'])->group(function () {
    Route::resource('patients', PatientsController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('delete/{id}', [PatientsController::class, 'destroy']);
Route::get('edit/{id}', [PatientsController::class, 'edit']);
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');

Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate.pdf');

Route::get('/', [SearchController::class, 'search'])->name('patients.search');
Route::get('api/search', [SearchController::class, 'search']);
