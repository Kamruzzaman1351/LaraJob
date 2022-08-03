<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);