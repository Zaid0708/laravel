<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserCreated;
use Illuminate\Support\Facades\Notification;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role_id', 2); // Owners role_id
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $owners = $query->get();
        return view('admin.owners.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:8',
        ]);
    
        // Create a new owner
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'password' => Hash::make($validated['password']),
            'role_id' => 2, // Assuming role_id for owners is 2
        ]);
    
        // Notify all authenticated users (or specific ones)
        // Example: Notification::send(User::all(), new OwnerCreatedNotification($user));
    
        return redirect()->route('owners.index')->with('success', 'Owner created successfully');
    }
    

    public function show($id)
    {
        $owner = User::findOrFail($id);
        return view('admin.owners.show', compact('owner'));
        
    }

    public function edit($id)
    {
        $owner = User::findOrFail($id);
        return view('admin.owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $owner = User::findOrFail($id);
        $owner->update($request->only(['name', 'email']));

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed']);
            $owner->password = bcrypt($request->password);
            $owner->save();
        }

        return redirect()->route('owners.index');
    }

    public function destroy($id)
    {
        $owner = User::findOrFail($id);
        $owner->delete();
        return redirect()->route('owners.index');
    }
}
