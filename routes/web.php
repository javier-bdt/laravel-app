<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// its same as below
Route::view('/', 'home');
Route::view('/contact', 'contact');
/*
Route::resource('jobs', JobController::class)->only(['index', 'show']);
Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');
*/
// same as above
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit,job');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit,job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit,job');

Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'login'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

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