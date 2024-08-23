<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show the registration form
    public function rentershowRegister()
    {
        return view('hotel_auth.register'); // Adjust this path if your view is in a different location
    }

    // Handle the registration
    public function renterregister(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:20',
        ]);

        // Create the new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'role_id' => 3, // Default role_id set to 3
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to a different page or return a success response
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
    public function ownershowRegister()
    {
        return view('hotel_auth.register'); // Adjust this path if your view is in a different location
    }

    // Handle the registration
    public function ownerregister(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:20',
        ]);

        // Create the new user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone_number'],
            'role_id' => 2, // Default role_id set to 3
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to a different page or return a success response
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }


    // Show the login form
    public function showLogin()
    {
        return view('hotel_auth.login'); // Adjust this path if your view is in a different location
    }

    // Handle the login
    public function login(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended or default page
            return redirect()->intended('dashboard')->with('success', 'You are logged in!');
        }

        // Authentication failed, redirect back with input and error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // Log the user out
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out!');
    }
}
