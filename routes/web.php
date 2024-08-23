<?php

use Illuminate\Support\Facades\Route;

Route::get('index', function () {
    return view('userPage.index');
});


Route::get('rooms', function () {
    return view('userPage.Rooms');
});



Route::get('about-us', function () {
    return view('userPage.about-us');
});


Route::get('about-us', function () {
    return view('userPage.about-us');
});




Route::get('room-details', function () {
    return view('userPage.room-details');
});

Route::get('blog-details', function () {
    return view('userPage.blog-details');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
use App\Http\Controllers\UserController;

Route::get('/renterreg', [UserController::class, 'rentershowRegister'])->name('register.form');
Route::post('/renterreg', [UserController::class, 'renterregister'])->name('register');
Route::get('/ownerreg', [UserController::class, 'ownershowRegister'])->name('register.form');
Route::post('/ownerreg', [UserController::class, 'ownerregister'])->name('register');
Route::get('/login2', [UserController::class, 'showLogin'])->name('login.form');
Route::post('/login2', [UserController::class, 'login'])->name('login');
Route::post('/logout2', [UserController::class, 'logout'])->name('logout');
Route::get('hotel',function(){
    return view('hotel');

});
