<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MultiStepForm;
use App\Http\Controllers\FormController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form', [FormController::class, 'submit'])->name('form.submit');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
Route::get('/profile-completion', [FormController::class, 'profileCompletion'])->name('form.profile-completion');
Route::post('/profile-completion', [FormController::class, 'completeProfile'])->name('profile.complete');

Route::get('/cities/search', [FormController::class, 'searchCities']);
Route::post('/cities/validate', [FormController::class, 'validateCity']);

