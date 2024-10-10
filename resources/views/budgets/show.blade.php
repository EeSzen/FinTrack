@extends("layouts.app")

@section('title','View')

@section('content')
<h1 class="text-start text-light mx-3">Budgets</h1>
<div class="box bg-light mt-5 py-5 text-center w-50 mx-auto rounded-4">
    <h1>{{ $budget->title }}</h1>
    <h4>By: {{ $budget->user->name }}</h4>
    <p>Created On: {{ $budget->created_at }}</p>
    <p>Budget: {{ $budget->budget }}</p>
    <p>Category: {{ $budget->category }}</p>
</div>

<div class="text-center">
        <a href="/" class="btn btn-dark mt-3"><i class="bi bi-caret-left"></i>Back to Home</a>
    </div>

@endsection