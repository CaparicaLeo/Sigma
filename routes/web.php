<?php

use App\Http\Controllers\SignUpController;
use Illuminate\Support\Facades\Route;

Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
})->name('signup');
Route::post('/signup', [SignUpController::class, 'signup'])->name('signup');

