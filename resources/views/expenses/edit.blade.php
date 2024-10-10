@extends("layouts.app")

@section('title', 'Edit Expenses')

@section('content')
<div class="custom-container mt-5">
    <h1 class="text-center mb-4 text-light">Edit Expense</h1>
    <div class="box mx-auto w-75 p-4 border rounded shadow-lg bg-dark text-light">
        <form action="/expenses/{{ $expense->id }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Error box -->
            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $expense->title }}" placeholder="Enter Expense Title" required>
            </div>

            <div class="form-group mb-3">
                <label for="value" class="form-label">Amount</label>
                <input class="form-control" id="value" name="value" type="number" value="{{ $expense->value }}" placeholder="Enter Expense Amount" required>
            </div>

            <div class="form-group mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category" id="category" required>
                    <option value="Food" {{ $expense->category == 'Food' ? 'selected' : '' }}>Food</option>
                    <option value="Rent" {{ $expense->category == 'Rent' ? 'selected' : '' }}>Rent</option>
                    <option value="Necessity" {{ $expense->category == 'Necessity' ? 'selected' : '' }}>Necessity</option>
                    <option value="Games" {{ $expense->category == 'Games' ? 'selected' : '' }}>Games</option>
                    <option value="Luxury" {{ $expense->category == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                    <option value="Utilities" {{ $expense->category == 'Utilities' ? 'selected' : '' }}>Utilities</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Expense</button>
        </form>
    </div>
</div>
@endsection
