<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserCreated;

class TenantController extends Controller
{
    public function index(Request $request)
    {
       $query = User::where('role_id', 3); // Assuming role_id 3 is for tenants

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }

        $tenants = $query->get();

        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            
        ]);

       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'role_id' => 3, // Tenant
        ]);


        // Notify all authenticated users (or specific ones)
        
        

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
    }

    public function show($id)
    {
        $tenant = User::findOrFail($id);
        return view('admin.tenants.show', compact('tenant'));
    }

    public function edit($id)
    {
        $tenant = User::findOrFail($id);
        return view('admin.tenants.edit', compact('tenant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $tenant = User::findOrFail($id);
        $tenant->update($request->only(['name', 'email']));

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed']);
            $tenant->password = bcrypt($request->password);
            $tenant->save();
        }

        return redirect()->route('tenants.index');
    }

    public function destroy($id)
    {
        $tenant = User::findOrFail($id);
        $tenant->delete();
        return redirect()->route('tenants.index');
    }
}
