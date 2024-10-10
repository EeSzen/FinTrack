@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container-fluid mt-5">
    <h1 class="text-center text-light mb-4">FinTrack</h1>

    @guest
        <div class="text-center text-light mb-4">
            <h3>Hello, {{ $name }}!</h3>
            <p>Please log in to start budgeting!</p>
            <a href="/signup" class="btn btn-outline-light px-5">Get Started</a>
        </div>
    @else
        <div class="text-center text-light mb-4">
            <h3>Welcome Back, {{ $name }}!</h3>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card bg-light shadow-sm">
                    <div class="card-header">
                        <h4>Current Role</h4>
                    </div>
                    <div class="card-body text-center">
                        @if(auth()->user()->role_id === 1)
                            <h5 class="bg-danger text-white rounded p-2">SUPER ADMIN</h5>
                        @elseif(auth()->user()->role_id === 2)
                            <h5 class="bg-success text-white rounded p-2">ADMIN</h5>
                        @else
                            <h5 class="bg-primary text-white rounded p-2">USER</h5>
                        @endif
                        <div class="mt-4">
                            <h4>Reports</h4> 
                            <a href="{{ route('budget_summary')}}" class="btn btn-primary m-1">Budget Summary Overview</a>
                            <a href="{{ route('summary')}}" class="btn btn-primary m-1">Summary Overview</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card bg-light shadow-sm">
                    <div class="card-header">
                        <h4>Summary Expenses</h4>
                    </div>
                    <div class="card-body">
                        <h5>Total Expenses: ${{ number_format($totalExpenses, 2) }}</h5>
                        <table class="table table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Value</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->title }}</td>
                                        <td>${{ number_format($expense->value, 2) }}</td>
                                        <td>{{ $expense->category }}</td>
                                        <td>
                                            <a href="{{ route('expenses.edit', $expense->id) }}" class="text-info">Edit</a>
                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-dark text-light p-4 rounded mb-5">
            <h2>My Budgets</h2>
            <div class="row">
                @foreach($budgets as $budget)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <h5>{{ $budget->title }}</h5>
                                <p>Category: {{ $budget->category }}</p>
                                <a href="/budgets/{{ $budget->id }}" class="btn btn-light rounded">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-dark text-light p-4 rounded">
            <h2>My Expenses</h2>
            <div class="row">
                @foreach($expenses as $expense)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>{{ $expense->title }}</h5>
                                <p>Category: {{ $expense->category }}</p>
                                <a href="/expenses/{{ $expense->id }}" class="btn btn-primary rounded">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endguest
</div>

<script src="{{ URL::asset('js/chart-script.js') }}"></script>
@endsection
