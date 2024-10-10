@extends('layouts.app')

@section('title', 'Budget Report')

@section('content')
    <div class="container mt-4">
        <h1 class="m-4">Budget Summary by Category</h1>

        @if ($budgetSummary->isEmpty())
            <p class="alert alert-warning">No budgets recorded.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Category</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($budgetSummary as $item)
                        <tr>
                            <td>{{ $item->category }}</td>
                            <td>{{ number_format($item->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="text-center">
        <a href="/" class="btn btn-dark mt-2"><i class="bi bi-caret-left"></i>Back to Home</a>
    </div>
@endsection