@extends("layouts.app")

@section('title', 'Expenses')

@section('content')
<div class="container-test bg bg-dark mx-auto py-5 my-5 w-50 rounded-4">
  <h1 class="text-light text-center mx-3">Add Expenses</h1>
  <div class="box mx-auto w-75">
  <form action="/expenses" method="POST">
              @csrf
              <!-- error box -->
              @if ( $errors->any() )
                  <div class="alert alert-danger">
                      @foreach ( $errors->all() as $error )
                          <div>{{ $error }}</div>
                      @endforeach
                  </div>
              @endif
              
              <div class="form-group mb-3">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
              </div>
              <div class="input-group mb-3 mx-auto">
                <span class="input-group-text">$</span>
                <input class="form-control" aria-label="Amount (to the nearest dollar)" id="value" name="value" placeholder="Value">
              </div>
              <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
                  <option value="">Category</option>
                  <option value="Food" >Food</option>
                  <option value="Rent" >Rent</option>
                  <option value="Neccesity">Neccesity</option>
                  <option value="Games">Games</option>
                  <option value="Luxury">Luxury</option>
                  <option value="Utilities">Utilities</option>
              </select>
              <button type="submit" class="btn rounded btn-purple text-light">Submit</button>
          </form>

  
    
  </div>
</div>

@endsection