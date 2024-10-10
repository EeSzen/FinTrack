<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
// Gate is to control who can access what
use Illuminate\Support\Facades\Gate;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //load the budgets
        $budgets = auth()->user()->budgets()->latest()->get();
        return view("budgets.index", ["budgets" => $budgets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("budgets.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //check if data is entered
        $validatedData = $request->validate([
            'title' => 'required',
            'budget' => 'required',
            'category' => 'required'
        ]);

        // create post with the current logged in user (user_id) built-in
        $budget = auth()->user()->budgets()->create( $validatedData );

        return redirect("/budgets")->with('success', 'Budget added successfully!')
        ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //load the budgets using id
        $budget = Budget::findOrFail($id);

        Gate::authorize('show',$budget);

        return view("budgets.show",compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //load the budgets using id
        $budget = Budget::findOrFail($id);

        Gate::authorize('edit',$budget);
         
        return view("budgets.edit",compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
         //load the budgets using id
        $budget = Budget::findOrFail($id);

        // make sure only the budget owner can update their own budget
        Gate::authorize('update',$budget);

        $validatedData = $request->validate([
            'title' => 'required',
            'budget' => 'required',
            'category' => 'required'
        ]);
        
        $budget->update($validatedData);

        return redirect("/budgets");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //load the budgets using id
        $budget = Budget::findOrFail($id);

        Gate::authorize('delete',$budget);

        // delete post
        $budget->delete();

        return redirect("/budgets");
    }

   
}
