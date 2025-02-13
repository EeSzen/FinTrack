<?php

namespace App\Policies;

use App\Models\Expenses;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpensesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expenses $expenses): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can edit models.
     */
    public function edit(User $user, Expenses $expenses): bool
    {
        return $user->id === $expenses->user_id || $user->role_id === '2' || $user->role_id === '1';
    }

    /**
     * Determine whether the user can see show models.
     */
    public function show(User $user, Expenses $expenses): bool
    {
        return $user->id === $expenses->user_id || $user->role_id === '2' || $user->role_id === '1';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expenses $expenses): bool
    {
        return $user->id === $expenses->user_id || $user->role_id === '2' || $user->role_id === '1';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expenses $expenses): bool
    {
        return $user->id === $expenses->user_id || $user->role_id === '2' || $user->role_id === '1';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Expenses $expenses): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Expenses $expenses): bool
    {
        //
    }
}
