<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



// Route::get('test', function() {

//     Mail::to('jeffrey@laracast.com')->send(new JobPosted);

//     return "Done!";

// });




// Route::get('/', function () {

//     return view('home');
// });

//this way is good for displaying static pages or views
Route::view('/', 'home');



// here is an important note which is if you have a route for example'jobs/{id}
//this means that if you write in the URL 'jobs/anything it will take this route 'jobs/{id}
// so make sure to place it before this route


// Route::get('/jobs', [JobController::class, 'index']);
// Route::get('jobs/create', [JobController::class, 'create']);
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// Route::post('/jobs', [JobController::class, 'store']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);


// a differnet way for grouping all routes with the same controller
Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index')->name('job.index');
    Route::get('jobs/create', 'create')->name('job.create');
    Route::get('/jobs/{job}', 'show')->name('job.show');
    Route::post('/jobs', 'store')->name('job.store')->middleware('auth');
    //first way
    //Route::get('/jobs/{job}/edit', 'edit')->name('job.edit')->middleware(['auth', 'can:edit-job,job']);
    //second way
    Route::get('/jobs/{job}/edit', 'edit')->name('job.edit')->middleware('auth')->can('edit', 'job');
    Route::patch('/jobs/{job}', 'update')->name('job.update');
    Route::delete('/jobs/{job}', 'destroy')->name('job.destroy');
});



// Route::get('/contact', function () {
//     return view('contact');
// });

Route::view('/contact', 'contact');


//Auth
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout.destroy');


