<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VisitController;

Route::get('/', function () {
    return redirect()->route('patients.index');
});

Route::prefix('patients')->name('patients.')->controller(PatientController::class)->group(function () {
    Route::get('get_patients', 'get_patients')->name('get_patients');
    Route::get('select2', 'select2')->name('select2');
});
Route::resource('patients', PatientController::class);


Route::prefix('visits')->name('visits.')->controller(VisitController::class)->group(function () {
    Route::get('get_visits', 'get_visits')->name('get_visits');
    Route::get('get_visits_by_patient/{patient}', 'get_visits_by_patient')->name('get_visits_by_patient');

});
Route::resource('visits', VisitController::class);