@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container-fluid mt-5">
    <h1 class="text-center text-light mb-4 fs-1">FinTrack</h1>

    @guest
        <!-- Guest User Section -->
        <div class="text-center text-light mb-4">
            <h3>Hello, {{ $name }}!</h3>
            <p>Please log in to start budgeting!</p>
            <a href="/signup" class="btn btn-outline-light px-5">Get Started</a>
        </div>
    @else
        <!-- Authenticated User Section -->
        <div class="text-center text-light mb-4">
            <h3>Welcome Back, {{ $name }}!</h3>
        </div>

        <div class="row mb-5">
            <!-- Current Role Card -->
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
                            <a href="{{ route('budget_summary') }}" class="btn btn-purple m-1">Budget Summary Overview</a>
                            <a href="{{ route('summary') }}" class="btn btn-purple m-1">Summary Overview</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Expenses Card -->
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
                                            <!-- model -->
                                             <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">WARNING</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Once deleted, There is no way to retrieve.
                                                        </br>
                                                        Are You Sure You Want To Delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <!-- Real DELETE button -->
                                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <!-- model -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Budgets Section -->
        <div class="title">
            <h1 class="text-center text-light p-3">Budgets</h1>
        </div>
        @if ($budgets->isEmpty())
            <p class="alert alert-dark">No budgets recorded.</p>
        @else
            <div class="bg-dark text-light p-4 rounded mb-5">
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
        @endif

        <!-- Expenses Section -->
        <div class="title">
            <h1 class="text-center text-light p-3">Expenses</h1>
        </div>
        @if ($expenses->isEmpty())
            <p class="alert alert-dark">No expenses recorded.</p>
        @else
            <div class="bg-dark text-light p-4 rounded">
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
        @endif
    @endguest
</div>

<script src="{{ URL::asset('js/chart-script.js') }}"></script>
@endsection
