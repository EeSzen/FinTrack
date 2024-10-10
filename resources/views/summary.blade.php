@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="m-4">Expense Summary by Category</h1>

        @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if ($summary->isEmpty())
            <p class="alert alert-warning">No expenses recorded.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Category</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($summary as $item)
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