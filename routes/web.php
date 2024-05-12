<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// its same as below
Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'login']);
Route::post('/login', [SessionController::class, 'store']);


/* its same as below
Route::view('/', 'home');

Route::get("/", function () {
    return view('home');
});

 group routes of JobController
Route::controller(JobController::class)->group(
    function () {
        Route::get('/jobs', 'index');
        Route::get('/jobs/create', 'create');
        Route::get('/jobs/{job}', 'show');
        Route::post('/jobs', 'store');
        Route::get('/jobs/{job}/edit', 'edit');
        Route::patch('/jobs/{job}', 'update');
        Route::delete('/jobs/{job}', 'destroy');
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