<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pass the user to the profile view
        return view('profile.index', compact('user'));
    }

        // Show the form to edit the user's profile
        public function edit()
        {
            $user = Auth::user();
            return view('profile.edit', compact('user'));
        }
    
        // Update the user's profile
        public function update(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
                'password' => 'nullable|string|min:8|confirmed',
            ]);
    
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
    
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }
    
            $user->save();
    
            return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
        }

}
