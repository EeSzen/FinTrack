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

    <!-- empty -->
    @if($budgets->isEmpty())
        <p class="mx-4 btn btn-sm disabled bg-light">No budgets yet.</p>
    @else
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
                                            <form action="/budgets/{{ $budget->id }}" method="POST" class="mb-0">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger rounded">Delete</button>
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
