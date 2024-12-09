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

Auth::routes();  // Esto ya incluye la ruta /login, no es necesario agregarla manualmente.

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Las siguientes rutas ya están incluidas en Auth::routes(), no es necesario agregar estas.
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta personalizada para eliminar y editar pacientes
Route::get('delete/{id}', [PatientsController::class, 'destroy']);
Route::get('edit/{id}', [PatientsController::class, 'edit']);

// Rutas para generar PDF y buscar
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/', [SearchController::class, 'search'])->name('patients.search');
Route::get('api/search', [SearchController::class, 'search']);
