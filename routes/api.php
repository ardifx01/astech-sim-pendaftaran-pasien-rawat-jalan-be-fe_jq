<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientApiController;
use App\Http\Controllers\Api\VisitApiController;

Route::prefix('v1')->group(function () {
    Route::apiResource('patients', PatientApiController::class);
    Route::apiResource('visits', VisitApiController::class);

    // Extra endpoints
    Route::get('patients/{patient}/visits', [VisitApiController::class, 'byPatient']);
});


