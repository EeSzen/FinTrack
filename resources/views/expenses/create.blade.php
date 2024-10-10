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


<!-- <div class="box d-flex w-75 py-5 mx-auto bg-light">
    <div class="col-lg-4 text-center">
      <i class="bi bi-alipay fs-1"></i>
    </div>
    <div class="col-lg-4 text-center">
      <i class="bi bi-piggy-bank fs-1"></i>
    </div>
    <div class="col-lg-4 text-center">
      <i class="bi bi-alipay fs-1"></i>
    </div>
  </div>
  <div class="box d-flex w-75 py-5 mx-auto bg-light">
    <div class="col-lg-4 text-center">
      <i class="bi bi-alipay fs-1"></i>
    </div>
    <div class="col-lg-4 text-center">
      <i class="bi bi-piggy-bank fs-1"></i>
    </div>
    <div class="col-lg-4 text-center">
      <i class="bi bi-alipay fs-1"></i>
    </div>
  </div>
  <div class="box d-flex w-75 py-5 mx-auto bg-light">
    <div class="col-lg-4 text-center">
      <i class="bi bi-alipay fs-1"></i>
    </div>
    <div class="col-lg-4 text-center">
      <i class="bi bi-piggy-bank fs-1"></i>
    </div>
    <div class="col-lg-4 text-center">
      <i class="bi bi-alipay fs-1"></i>
    </div>
  </div> -->

<!-- <div class="container-test d-flex justify-content-center">
    <div class="text-center">
      <input type="text" id="num1" placeholder="Input Value Here">
      <input type="text" id="num2" placeholder="Input Value Here">
      <br>
      <button id="add" class="btn btn-purple">Addition</button>
      <button id="subtract" class="btn btn-purple">Subtraction</button>
      <button id="multiply" class="btn btn-purple">Multiplication</button>
      <button id="divide" class="btn btn-purple">Division</button>
    </div>
    <h2>= <h2 id="result">?</h2></h2>
</div> -->


<!-- calculator script -->
<script src="{{ URL::asset('js/calc-script.js'); }}"></script>
@endsection