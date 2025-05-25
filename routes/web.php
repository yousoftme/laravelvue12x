<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken('initiate-contract');
    return ['token' => $token->plainTextToken]; // use as a Bearer token in the Authorization header
})->middleware(['auth', 'verified'])->name('create-token');
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
