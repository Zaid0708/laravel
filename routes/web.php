<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Room2Controller;
use App\Http\Controllers\Hotel2Controller;
use App\Http\Controllers\Room3Controller;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/renterreg', [UserController::class, 'rentershowRegister'])->name('register.form');
Route::post('/renterreg', [UserController::class, 'renterregister'])->name('register');
Route::get('/ownerreg', [UserController::class, 'ownershowRegister'])->name('oregister.form');
Route::post('/ownerreg', [UserController::class, 'ownerregister'])->name('oregister');
Route::get('/login2', [UserController::class, 'showLogin'])->name('login.form');
Route::post('/login2', [UserController::class, 'login'])->name('login');
Route::post('/logout2', [UserController::class, 'logout'])->name('logout');
Route::get('hotel',function(){
    return view('hotel');

});


// web.php
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



Route::get('hotels', function () {
    return view('userPage.hotels');
});



Route::get('/hotels/{hotelId}/rooms3', [Room2Controller::class, 'index'])->name('rooms3.index');

Route::get('/hotels', [Hotel2Controller::class, 'index'])->name('hotels.index');

Route::get('/index', [IndexController::class, 'index'])->name('userPage.index');


Route::get('blog-details', function () {
    return view('userPage.blog-details');
});

Route::get('contact', function () {
    return view('userPage.contact');
});
Route::get('about-us', function () {
    return view('userPage.about-us');
});
Route::get('payment', function () {
    return view('userPage.payment');
});




Route::get('room-details', function () {
    return view('userPage.room-details');
});
Route::get('/room-details', [Room3Controller::class, 'index'])->name('room.details');
Route::get('book-now', function () {
    return view('userPage.book-now');
});

Route::get('checkout', function () {
    return view('userPage.checkout');
});
