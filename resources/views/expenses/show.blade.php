@extends("layouts.app")

@section('title', 'Expenses')

@section('content')
    <!-- Page Title -->
    <h1 class="text-start mx-3 text-light">Expenses</h1>

    <!-- Expense Details Box -->
    <div class="box bg-light mt-5 py-5 text-center w-50 mx-auto rounded-4">
        <h1>{{ $expense->title }}</h1>
        <h4>By: {{ $expense->user->name }}</h4>
        <p>Created On: {{ $expense->created_at->format('F j, Y') }}</p> <!-- Format date for better readability -->
        <p>Expense Amount: ${{ number_format($expense->value, 2) }}</p> <!-- Format value as currency -->
        <p>Category: {{ $expense->category }}</p>
    </div>

    <!-- Back to Home Button -->
    <div class="text-center">
        <a href="/" class="btn btn-dark mt-3">
            <i class="bi bi-caret-left"></i>Back to Home
        </a>
    </div>
@endsection
