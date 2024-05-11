<?php

use App\Http\Controllers\JobController;
use App\Livewire\Counter;
use App\Livewire\CreatePost;
use App\Livewire\ShowPost;
use App\Livewire\CreatePostInline;
use Illuminate\Support\Facades\Route;

Route::get("/", JobController::class . '@index');

Route::get('/jobs', [JobController::class, 'getJobs']);

Route::get('/jobs/create', [JobController::class, 'createJob']);

Route::get('/jobs/{id}', [JobController::class, 'showJob']);

Route::post('/jobs', [JobController::class, 'storeJob']);

Route::get('/jobs/{id}/edit', [JobController::class, 'editJob']);

Route::patch('/jobs/{id}', [JobController::class, 'updateJob']);

Route::delete('/jobs/{id}', [JobController::class, 'deleteJob']);



Route::get('/contact', function () {
    return view('contact');
});

// route name counter go to /counter
Route::get('/counter', Counter::class);
Route::get('/post-inline', CreatePostInline::class);
Route::get('/post', CreatePost::class);
Route::get('/post/{id}', ShowPost::class);