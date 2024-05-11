<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// its same as below
Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);

/* its same as below
Route::view('/', 'home');

Route::get("/", function () {
    return view('home');
});

 group routes of JobController

Route::controller(JobController::class)->group(
    function () {
        Route::get('/jobs', 'index');
        Route::get('/jobs/create', 'createJob');
        Route::get('/jobs/{job}', 'showJob');
        Route::post('/jobs', 'storeJob');
        Route::get('/jobs/{job}/edit', 'editJob');
        Route::patch('/jobs/{job}', 'updateJob');
        Route::delete('/jobs/{job}', 'destroyJob');
    }
);

 if we follow the convention of laravel we can use below code

Route::resource(
    'jobs',
    JobController::class,
    [
        "only" => ["index", "show", "create", "store", "edit", "update", "destroy"],
        "except" => [],
    ]
);
*/