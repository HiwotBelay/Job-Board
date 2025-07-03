<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Models\Job;

use App\Http\Controllers\JobApplicationController;

Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('jobs.apply');

Route::get('/', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

Route::resource('jobs', JobController::class);

Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/jobs/{job}', function (\App\Models\Job $job) {
    return view('jobs.show', compact('job'));
})->name('jobs.show');

use Illuminate\Support\Facades\Session;

Route::post('/jobs/{job}/save', function (\App\Models\Job $job) {
    $saved = Session::get('saved_jobs', []);
    $saved[$job->id] = $job->id;
    Session::put('saved_jobs', $saved);
    return redirect()->back()->with('success', 'Job saved to wishlist!');
})->name('jobs.save');

Route::delete('/jobs/{job}/unsave', function (\App\Models\Job $job) {
    $saved = Session::get('saved_jobs', []);
    unset($saved[$job->id]);
    Session::put('saved_jobs', $saved);
    return redirect()->back()->with('success', 'Job removed from wishlist!');
})->name('jobs.unsave');
