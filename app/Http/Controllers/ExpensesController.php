<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
// Gate is to control who can access what
use Illuminate\Support\Facades\Gate;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Load the expenses
        $expenses = auth()->user()->expenses()->latest()->get();
        
        // Calculate total expenses
        $totalExpenses = auth()->user()->expenses()->sum('value');

        return view("expenses.index", [
            "expenses" => $expenses,
            "totalExpenses" => $totalExpenses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("expenses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //check if data is entered
        $validatedData = $request->validate([
            'title' => 'required',
            'value' => 'required',
            'category' => 'required'
        ]);

        // create post with the current logged in user (user_id) built-in
        $expense = auth()->user()->expenses()->create( $validatedData );

        return redirect("/expenses")->with('success', 'Expense added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //load the expenses using id
        $expense = Expenses::findOrFail($id);

        Gate::authorize('show',$expense);

        return view("expenses.show",compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // load the expense by id
         $expense = Expenses::findOrFail($id);

         // make sure only the expense owner can update their own expense
         Gate::authorize('edit',$expense);
         
         return view("expenses.edit",compact('expense'));
         // compact('expense') is equal to [ 'expense' => $expense ]
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // load the expense by id
        $expense = Expenses::findOrFail($id);

        Gate::authorize('update',$expense);

        //check if data is entered
        $validatedData = $request->validate([
            'title' => 'required',
            'value' => 'required',
            'category' => 'required'
        ]);

        $expense->update($validatedData);

        return redirect("/expenses");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //load the expenses using id
         $expense = Expenses::findOrFail($id);

         Gate::authorize('delete',$expense);

         // delete post
         $expense->delete();
 
         return redirect("/expenses");
    }
}
