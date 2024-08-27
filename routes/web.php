<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelAdminController;

<<<<<<< Updated upstream
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


Route::get('room-details', function () {
    return view('userPage.room-details');
});
Route::post('/index', [Hotel2Controller::class, 'search'])->name('hotels.search');


Route::get('/hotel/{hotelId}/rooms', [HotelController::class, 'showRooms'])->name('hotel.rooms');
Route::get('/hotel/{hotelId}/rooms', [HotelController::class, 'showRooms'])->name('rooms3.index');



Route::get('hotels', function () {
    return view('userPage.hotels');
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





Route::get('book-now', function () {
    return view('userPage.book-now');
});

Route::get('checkout', function () {
    return view('userPage.checkout');
=======



Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Route::get('/admin/dashboard',function(){
//     return view('admin.dashboard');
// });
Route::get('/dashboard/counts', [DashboardController::class, 'getCounts'])->name('dashboard.counts');



Route::prefix('owners')->name('owners.')->middleware('auth')->group(function () {
    Route::get('/', [OwnerController::class, 'index'])->name('index');
    Route::get('/create', [OwnerController::class, 'create'])->name('create');
    Route::post('/', [OwnerController::class, 'store'])->name('store');
    Route::get('/{id}', [OwnerController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [OwnerController::class, 'edit'])->name('edit');
    Route::put('/{id}', [OwnerController::class, 'update'])->name('update');
    Route::delete('/{id}', [OwnerController::class, 'destroy'])->name('destroy');
    Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');

});

Route::prefix('tenants')->name('tenants.')->middleware('auth')->group(function () {
    Route::get('/', [TenantController::class, 'index'])->name('index');
    Route::get('/create', [TenantController::class, 'create'])->name('create');
    Route::post('/', [TenantController::class, 'store'])->name('store');
    Route::get('/{id}', [TenantController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TenantController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TenantController::class, 'update'])->name('update');
    Route::delete('/{id}', [TenantController::class, 'destroy'])->name('destroy');
    Route::get('/admin/tenants', [TenantController::class, 'index'])->name('admin.tenants.index');
    Route::resource('tenants', TenantController::class);
    Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');



});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');
Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update')->middleware('auth');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');



// Route to display all hotels owned by the user
Route::get('/hotels', [HotelAdminController::class, 'index'])->name('hotels.index');

// Route to display details of a specific hotel
Route::get('/hotels/{id}', [HotelAdminController::class, 'show'])->name('hotels.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/hotels', [HotelAdminController::class, 'index'])->name('hotels.index');
    
    Route::post('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

    Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');

>>>>>>> Stashed changes
});

