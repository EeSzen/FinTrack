<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

// assign roles
class assignRolesToUsersController extends Controller
{
    public function assignRolesToUsersPage()
    {
        $users = User::all();
        $roles = Role::all(); // Fetch all roles
    
        return view('super_admin', compact('users', 'roles'));
    }
    
     // Method to handle role assignment
    public function assignRolesToUsersController(Request $request, $id)
    {
    $validatedData = $request->validate([
        'role_id' => 'required|exists:roles,id', // Ensure the role exists
    ]);

    $user = User::findOrFail($id); // Find the user or fail
    $user->role_id = $validatedData['role_id']; // Update role_id
    $user->save();

    return redirect()->route('super_admin') // Change this to your desired route
                         ->with('success', 'Role assigned successfully.');
    }

}

