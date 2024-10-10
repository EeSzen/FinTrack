@extends('layouts.app')

@section('title', 'Signup')

@section('content')
    <div class="container mt-5" id="container">
 <!-- Create Account -->
        <div class="form-container signup">
            <form action="/signup" method="POST">
                <!-- Cross Site Request Forgery -->
                @csrf
                <h1>Create Account</h1>
                <input type="text" placeholder="Name" id="name" name="name"/>
                <input type="email" placeholder="Email" id="email" name="email"/>
                <input type="password" placeholder="Password" id="password" name="password"/>
                <input type="password" placeholder="Confirm Password" id="confirm_password" name="password_confirmation"/>
                <button type="submit">Sign Up</button>
            </form>
        </div>
<!-- Login your Account -->
        <div class="form-container login">
            <form action="/login" method="POST">
                 <!-- Cross Site Request Forgery -->
                 @csrf
                <h1>Log In</h1>
                <input type="email" placeholder="Email" id="email" name="email" />
                <input type="password" placeholder="Password" id="password"
                name="password"
            />
                <a href="#" class="btn btn-sm px-3 py-2 rounded-4 ">Forgot Your Password?</a>
                <button type="submit">Login</button>
            </form>
        </div>
<!-- Redirect to Login -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Login</button>
                </div>
<!-- Redirect to Sign Up -->
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<div class="text-center mt-3 w-50 mx-auto">
    <!-- error box -->
    @if ( $errors->any() )
        <div class="alert alert-danger">
        @foreach ( $errors->all() as $error )
            <div>{{ $error }}</div>
        @endforeach
        </div>
    @endif
</div>
<div class="text-center">
    <a href="/" class="btn btn-dark mt-2"><i class="bi bi-caret-left"></i>Back to Home</a>
</div>
    
    <!-- footer -->
<!-- public connect js -->
<script src="{{ URL::asset('js/script.js'); }}"></script>
@endsection