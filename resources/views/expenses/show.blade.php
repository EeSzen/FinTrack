@extends("layouts.app")

@section('title', 'Expenses')

@section('content')
<h1 class="text-start mx-3 text-light">Expenses</h1>
<div class="box bg-light mt-5 py-5 text-center w-50 mx-auto rounded-4">
    <h1>{{ $expense->title }}</h1>
    <h4>By: {{ $expense->user->name }}</h4>
    <p>Created On: {{ $expense->created_at }}</p>
    <p>expense: {{ $expense->value }}</p>
    <p>Category: {{ $expense->category }}</p>
</div>

<div class="text-center">
        <a href="/" class="btn btn-dark mt-2"><i class="bi bi-caret-left"></i>Back to Home</a>
    </div>






@endsection