<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Expenses;

class HomeController extends Controller
{
    public function loadHomePage()
    {
        // check if user is logged in or not
        if(auth()->check()){
            $name = auth()->user()->name;
        }else{
            $name = 'Guest';
        }
        // role check
        $role = auth()->check() ? auth()->user()->role : null; // Get user role if logged in

        // Initialize variables
        $totalExpenses = 0;

        // Load the budgets and expenses for the authenticated user only
        if (auth()->check()) {
            $budgets = auth()->user()->budgets()->latest()->get();
            $expenses = auth()->user()->expenses()->latest()->get();
            // Calculate total expenses from the collection
            $totalExpenses = $expenses->sum('value');
        } else {
            // If not logged in, load all budgets and expenses
            $budgets = Budget::latest()->get();
            $expenses = Expenses::latest()->get();
        }
        
        // Prepare the data for the view
        return view('home', compact('name', 'budgets', 'expenses', 'totalExpenses','role'));
    }
}
