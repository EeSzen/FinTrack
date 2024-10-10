@extends("layouts.app")

@section('title', 'Expenses')

@section('content')
<div class="container-fluid mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-light">Expenses</h1>
        <a href="/expenses/create" class="btn btn-purple text-light">Add Expenses</a>
    </div>

    <!-- Success box -->
    @if (session('success'))
        <div class="alert alert-success w-75 mx-auto">{{ session('success') }}</div>
    @endif

    <h2 class="text-success m-3">Total Expenses: ${{ number_format($totalExpenses, 2) }}</h2>
    
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
                                <a href="/expenses/{{$expense->id}}" class="btn btn-success rounded btn-sm">View</a>
                                <a href="/expenses/{{$expense->id}}/edit" class="btn btn-primary rounded btn-sm">Edit</a>
                                <form action="/expenses/{{ $expense->id }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection