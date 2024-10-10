@extends("layouts.app")

@section('title', 'Edit Expenses')

@section('content')
<div class="custom-container mt-5">
    <h1 class="text-center mb-4 text-light">Edit User Profile</h1>
    <div class="box mx-auto p-4 border rounded shadow-lg bg-dark text-light">
    @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2 )
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" disabled>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Leave blank to keep current password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Leave blank to keep current password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
        </form>

        @if (auth()->user()->role_id === 1)
            <form action="{{ route('user.destroy') }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">Delete Account</button>
            </form>
        @endif
    @endif
        
    </div>
</div>
@endsection
