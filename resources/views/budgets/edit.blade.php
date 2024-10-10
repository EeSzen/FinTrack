@extends("layouts.app")

@section('title', 'Edit Budget')

@section('content')
<div class="custom-container mt-5">
    <h1 class="text-center mb-4 text-light">Edit Budget</h1>
    <div class="box mx-auto w-75 p-4 border rounded shadow-lg bg-dark text-light">
        <form action="/budgets/{{ $budget->id }}" method="POST">
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
                <input type="text" class="form-control" id="title" name="title" value="{{ $budget->title }}" placeholder="Enter Budget Title" required>
            </div>

            <div class="form-group mb-3">
                <label for="budget" class="form-label">Budget Amount</label>
                <input class="form-control" id="budget" name="budget" type="number" value="{{ $budget->budget }}" placeholder="Enter Budget Amount" required>
            </div>

            <div class="form-group mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category" id="category" required>
                    <option value="Food" {{ $budget->category == 'Food' ? 'selected' : '' }}>Food</option>
                    <option value="Rent" {{ $budget->category == 'Rent' ? 'selected' : '' }}>Rent</option>
                    <option value="Necessity" {{ $budget->category == 'Necessity' ? 'selected' : '' }}>Necessity</option>
                    <option value="Games" {{ $budget->category == 'Games' ? 'selected' : '' }}>Games</option>
                    <option value="Luxury" {{ $budget->category == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                    <option value="Utilities" {{ $budget->category == 'Utilities' ? 'selected' : '' }}>Utilities</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Budget</button>
        </form>
    </div>
</div>
@endsection
