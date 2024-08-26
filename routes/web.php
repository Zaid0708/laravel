<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Room2Controller;
use App\Http\Controllers\Room3Controller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Hotel2Controller;
use Illuminate\Support\Facades\Route;

// Dashboard Routes with Authentication Middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// User Registration and Authentication Routes
Route::get('/renterreg', [UserController::class, 'rentershowRegister'])->name('register.form');
Route::post('/renterreg', [UserController::class, 'renterregister'])->name('register');
Route::get('/ownerreg', [UserController::class, 'ownershowRegister'])->name('oregister.form');
Route::post('/ownerreg', [UserController::class, 'ownerregister'])->name('oregister');
Route::get('/login2', [UserController::class, 'showLogin'])->name('login.form');
Route::post('/login2', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Owner-Specific Routes
Route::group(['middleware' => ['auth', 'check.role:2']], function () {
    Route::resource('owner', HotelController::class);
    Route::get('/hotels/{hotelId}/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/hotels/{hotelId}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/hotels/{hotelId}/rooms', [RoomController::class, 'store'])->name('rooms.store');
});

// General Routes
Route::get('/hotel', function() {
    return view('hotel');
});

Route::get('hotels', [Hotel2Controller::class, 'index'])->name('hotels.index');
Route::get('/hotels/{hotelId}/rooms3', [Room2Controller::class, 'index'])->name('rooms3.index');
Route::post('/index', [Hotel2Controller::class, 'search'])->name('hotels.search');
Route::get('/index', [IndexController::class, 'index'])->name('userPage.index');

// Static Pages Routes
Route::view('blog-details', 'userPage.blog-details');
Route::view('contact', 'userPage.contact');
Route::view('about-us', 'userPage.about-us');
Route::view('payment', 'userPage.payment');

// Room Details Route
Route::get('/room-details/{roomId}', [Room3Controller::class, 'index'])->name('room.details');

// Booking Routes
Route::get('/book-now/{roomId}', [BookingController::class, 'showBookingForm'])->name('book.now');
Route::post('/process-booking', [BookingController::class, 'processBooking'])->name('process.booking');
Route::get('/user-info-payment', [BookingController::class, 'showUserInfoPayment'])->name('user.info.payment');

// Review Routes
Route::post('/rooms/{room}/reviews', [Room3Controller::class, 'storeReview'])->name('reviews.store');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/finalize-booking', [BookingController::class, 'finalizeBooking'])->name('finalize.booking');
