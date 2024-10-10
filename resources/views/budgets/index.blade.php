@extends("layouts.app")

@section('title', 'Budgets')

@section('content')
<!-- display the budgets -->
<div class="container-fluid mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-light">My Budgets</h1>
        <a href="/budgets/create" class="btn btn-purple text-light">Add New Budget</a>
    </div>
    
    <!-- success box -->
    @if (session('success'))
        <div class="alert alert-success w-75 mx-auto">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($budgets as $budget)
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $budget->title }}</h3>
                        <h5>Category: {{ $budget->category }}</h5>
                        <div class="d-flex align-items-center gap-2">
                            <a href="/budgets/{{$budget->id}}" class="btn btn-success rounded btn-sm">View</a>
                            <a href="/budgets/{{$budget->id}}/edit" class="btn btn-primary rounded btn-sm">Edit</a>
                            <form action="/budgets/{{ $budget->id }}" method="POST" class="mb-0">
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
</div>
@endsection
