<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses; // Import the Expense model
use App\Models\Budget; // Import the Budget model
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function summary()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Fetch total expenses grouped by category
        $summary = Expenses::selectRaw('category, SUM(value) as total')
            ->where('user_id', $userId) // Assuming 'user_id' is the foreign key in Expenses
            ->groupBy('category')
            ->get();

        // Pass the summary data to the view
        return view('summary', compact('summary'));
    }
    
     // budget summary
     public function budgetSummary()
     {
         $userId = Auth::id();
 
         $budgetSummary = Budget::selectRaw('category, SUM(budget) as total') // Assuming 'amount' is the budget value
             ->where('user_id', $userId) // Assuming 'user_id' is the foreign key in Budgets
             ->groupBy('category')
             ->get();
 
         return view('budget_summary', compact('budgetSummary'));
     }
}
