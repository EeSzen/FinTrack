<?php

namespace App\Providers;

use App\Policies\BudgetPolicy;
use App\Models\Budget;
use App\Policies\ExpensesPolicy;
use App\Models\Expenses;
use App\Policies\UserPolicy;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //apply policy
        Gate::policy( Budget::class, BudgetPolicy::class);

        //apply policy
        Gate::policy( Expenses::class, ExpensesPolicy::class);

        //apply policy
        Gate::policy( User::class, UserPolicy::class);
    }
}
