<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->role_id === 2 || $user->role_id === 1; // Admin can view all users
    }

    public function view(User $user, User $model)
    {
        return $user->id === $model->id || $user->role_id === 2 || $user->role_id === 1; // User can view their own profile or if they're an admin
    }

    public function edit(User $user, User $model)
    {
        return $user->id === $model->id || $user->role_id === 2 || $user->role_id === 1; // User can view their own profile or if they're an admin
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id || $user->role_id === 2 || $user->role_id === 1; // User can update their own profile or if they're an admin
    }

    public function delete(User $user, User $model)
    {
        return $user->role_id === 1; // Only super admin can delete users
    }
}