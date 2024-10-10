<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Or however you retrieve users
        $roles = Role::all(); // Assuming you have a Role model
    
        return view('super_admin', compact('users', 'roles'));
    }
}