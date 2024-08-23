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
