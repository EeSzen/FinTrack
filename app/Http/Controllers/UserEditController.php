<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserEditController extends Controller
{
// Show the user edit form with current user details
public function edit($id)
{
    $user = User::findOrFail($id); // Get the currently authenticated user

    Gate::authorize('edit',$user);

    return view('edit_users', compact('user')); // Pass user data to the view
}

// Update the user details
public function update(Request $request, $id)
{
    $user = User::findOrFail($id); // Get the currently authenticated user

   

    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:8|confirmed', // Ensure the password is confirmed
    ]);

    // Update user attributes
    $user->name = $request->input('name');

    // Update password if provided
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save(); // Save changes to the database

    return redirect()->route('super_admin')->with('success', 'Profile updated successfully.');
}

// Delete the user account
public function destroy($id)
{
    $user = User::findOrFail($id); // Get the currently authenticated user

    Gate::authorize('delete',$user);

    $user->delete(); // Delete the user

    return redirect()->route('super_admin')->with('success', 'Account deleted successfully.');
}
}
