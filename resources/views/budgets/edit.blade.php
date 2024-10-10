@extends("layouts.app")

@section('title', 'Edit')

@section('content')
<div class="container-test">
    <h1 class="text-center">Edit Budget</h1>
    <div class="box mx-auto w-50">
        <form action="/budgets/{{ $budget->id }}" method="POST">
            @csrf
            <!-- error box -->
            @if ( $errors->any() )
                <div class="alert alert-danger">
                    @foreach ( $errors->all() as $error )
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @method('PUT')
            <div class="form-group mb-3">
                <input type="text" class="form-control" id="title" name="title" value="{{ $budget->title }}" placeholder="Title">
            </div>
            <div class="form-group mb-3">
                <input class="form-control" id="budget" name="budget" value="{{ $budget->budget }}" placeholder="Budget">
            </div>

            <select class="form-select mb-3" value="{{ $budget->category }}" name="category" id="category">

                @if($budget['category']=='Food')
                <option value="Food" >Food</option>
                <option value="Rent" >Rent</option>
                <option value="Neccesity">Neccesity</option>
                <option value="Games">Games</option>
                <option value="Luxury">Luxury</option>
                <option value="Utilities">Utilities</option>
                @elseif($budget['category']=='Rent')
                <option value="Rent" >Rent</option>
                <option value="Food" >Food</option>
                <option value="Neccesity">Neccesity</option>
                <option value="Games">Games</option>
                <option value="Luxury">Luxury</option>
                <option value="Utilities">Utilities</option>
                @elseif($budget['category']=='Neccesity')
                <option value="Neccesity">Neccesity</option>
                <option value="Food" >Food</option>
                <option value="Rent" >Rent</option>
                <option value="Games">Games</option>
                <option value="Luxury">Luxury</option>
                <option value="Utilities">Utilities</option>
                @elseif($budget['category']=='Games')
                <option value="Games">Games</option>
                <option value="Food" >Food</option>
                <option value="Rent" >Rent</option>
                <option value="Neccesity">Neccesity</option>
                <option value="Luxury">Luxury</option>
                <option value="Utilities">Utilities</option>
                @elseif($budget['category']=='Luxury')
                <option value="Luxury">Luxury</option>
                <option value="Food" >Food</option>
                <option value="Rent" >Rent</option>
                <option value="Neccesity">Neccesity</option>
                <option value="Games">Games</option>
                <option value="Utilities">Utilities</option>
                @else
                <option value="Utilities">Utilities</option>
                <option value="Food" >Food</option>
                <option value="Rent" >Rent</option>
                <option value="Neccesity">Neccesity</option>
                <option value="Games">Games</option>
                <option value="Luxury">Luxury</option>
                @endif

            </select>
            <button type="submit" class="btn rounded btn-purple">Update</button>
        </form>
    </div>
    
</div>








@endsection