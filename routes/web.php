<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{id}/edit', [JobController::class, 'edit']);
Route::put('/jobs/{id}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'delete']);