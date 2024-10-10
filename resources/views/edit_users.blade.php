@extends("layouts.app")

@section('title', 'Edit Expenses')

@section('content')
<div class="custom-container mt-5">
    <h1 class="text-center mb-4 text-light">Edit User Profile</h1>
    <div class="box mx-auto p-4 border rounded shadow-lg bg-dark text-light">
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

        @if (auth()->user()->role_id === 1 && auth()->user()->id !== $user->id)
            <!-- model -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger w-100 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                    <div class="modal-body text-dark">
                        Once deleted, There is no way to retrieve.
                        </br>
                        Are You Sure You Want To Delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Real DELETE button -->
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        <!-- model -->
        @endif
    </div>
</div>
@endsection
