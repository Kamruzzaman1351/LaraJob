<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobApplyController;
Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth')->name('jobs.create');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');
Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs/{job}', [JobController::class, 'delete'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/jobs', [JobController::class, 'userJobs'])->name('users.jobs');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/apply/{job}', [JobApplyController::class, 'apply'])->middleware('auth');
Route::post('/apply/{job}', [JobApplyController::class, 'applyJob'])->middleware('auth');
Route::get('/user/notification', [UserController::class, 'notification'])->middleware('auth');
Route::get('apply/{job}/applications', [JobApplyController::class, 'applications'])->middleware('auth');
Route::get('/file-download/{apply}', [JobApplyController::class, 'fileDownload'])->middleware('auth');