<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelAdminController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/dashboard3', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::post('/reviews/{room}', [ReviewController::class, 'store'])->name('reviews.store');
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
    Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
    Route::get('/hotels/{hotelId}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
// Route to fetch booked dates


// Static Pages Routes
Route::view('blog-details', 'userPage.blog-details');
Route::view('contact', 'userPage.contact');
Route::view('about-us', 'userPage.about-us');
Route::view('payment', 'userPage.payment');
// Route for hotel search
// routes/web.php
Route::post('/hotels/search-by-location-and-guests', [Hotel2Controller::class, 'searchByLocationAndGuests'])->name('hotels.searchByLocationAndGuests');

Route::post('/hotels/search', [Hotel2Controller::class, 'search'])->name('hotels.search');
// Route for Room2Controller
Route::get('hotels/{hotelId}/rooms2', [Room2Controller::class, 'index'])->name('rooms2.index');

// Route to display all hotels
Route::get('/hotels', [Hotel2Controller::class, 'index'])->name('hotels.index');


// Room Details Route
Route::get('/room-details/{roomId}', [Room3Controller::class, 'index'])->name('room.details');

// Booking Routes
Route::get('/book-now/{roomId}', [BookingController::class, 'showBookingForm'])->name('book.now');
Route::post('/process-booking', [BookingController::class, 'processBooking'])->name('process.booking');
Route::get('/user-info-payment', [BookingController::class, 'showUserInfoPayment'])->name('user.info.payment');
Route::post('/finalize-booking', [BookingController::class, 'finalizeBooking'])->name('finalize.booking');

// Admin Dashboard Routes


// Owner Routes


// Tenant Routes

// Auth Routes


// Profile Routes


// Hotel Routes
Route::get('/hotels', [Hotel2Controller::class, 'index'])->name('hotels.index'); 
// Add this line to your web.php file
Route::get('/index', [IndexController::class, 'index'])->name('userPage.index');
// Consolidated hotel index route

// Routes to display rooms of a specific hotel
Route::get('/hotels/{hotelId}/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/hotels/{hotelId}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/hotels/{hotelId}/rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

// Room Details Route
Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');

// Routes for Room2Controller and Room3Controller
Route::get('/hotels/{hotelId}/rooms2', [Room2Controller::class, 'index'])->name('rooms2.index');
Route::get('/room-details/{roomId}', [Room3Controller::class, 'index'])->name('room.details');
// In routes/web.php or routes/api.php
Route::get('/room-reservations/{roomId}', [Room2Controller::class, 'getRoomReservations']);

Route::group(['middleware' => ['auth', 'check.role:1']], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::prefix('tenants')->name('tenants.')->group(function () {
        Route::get('/', [TenantController::class, 'index'])->name('index');
        Route::get('/create', [TenantController::class, 'create'])->name('create');
        Route::post('/', [TenantController::class, 'store'])->name('store');
        Route::get('/{id}', [TenantController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TenantController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TenantController::class, 'update'])->name('update');
        Route::delete('/{id}', [TenantController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('owners')->name('owners.')->group(function () {
        Route::get('/', [OwnerController::class, 'index'])->name('index');
        Route::get('/create', [OwnerController::class, 'create'])->name('create');
        Route::post('/', [OwnerController::class, 'store'])->name('store');
        Route::get('/{id}', [OwnerController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [OwnerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [OwnerController::class, 'update'])->name('update');
        Route::delete('/{id}', [OwnerController::class, 'destroy'])->name('destroy');
    });
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Dashboard Counts
Route::get('/dashboard/counts', [DashboardController::class, 'getCounts'])->name('dashboard.counts');
Route::get('/hoteladmin', [HotelAdminController::class, 'index'])->name('adminhotel.index');
Route::get('/hoteladmin/{hotelid}', [HotelAdminController::class, 'show'])->name('adminhotel.show');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});
// web.php
Route::get('/user-info', [BookingController::class, 'showUserInfoPayment'])->name('userPage.info');


?>
