@extends("layouts.app")

@section('title', 'Expenses')

@section('content')
<div class="container-fluid mt-5">
    <!-- Header with Title and Add Expense Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-light">Expenses</h1>
        <a href="/expenses/create" class="btn btn-purple text-light">Add Expenses</a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success w-75 mx-auto">{{ session('success') }}</div>
    @endif

    <!-- Total Expenses Display -->
    <h2 class="text-success m-3">Total Expenses: ${{ number_format($totalExpenses, 2) }}</h2>

    <!-- Check if there are any expenses -->
    @if($expenses->isEmpty())
        <p class="mx-4 btn btn-sm disabled bg-light">No expenses yet.</p>
    @else
        <div class="row">
            @foreach ($expenses as $expense)
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $expense->title }}</h3>
                            <h5>Category: {{ $expense->category }}</h5>
                            <div class="d-flex align-items-center gap-2">
                                <!-- View Expense Button -->
                                <a href="/expenses/{{$expense->id}}" class="btn btn-success rounded btn-sm">View</a>
                                <!-- Edit Expense Button -->
                                <a href="/expenses/{{$expense->id}}/edit" class="btn btn-primary rounded btn-sm">Edit</a>
                                <!-- model -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                            <form action="/expenses/{{ $expense->id }}" method="POST" class="mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger rounded" type="submit" >Delete</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- model -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
