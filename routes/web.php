<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
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
Route::get('/ownerreg', [UserController::class, 'ownershowRegister'])->name('register.form');
Route::post('/ownerreg', [UserController::class, 'ownerregister'])->name('register');
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

