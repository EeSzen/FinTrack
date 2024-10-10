@extends("layouts.app")

@section('title', 'Manage Users')

@auth

@if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2)

@section('content')

<div class="container mt-5">
    <h1 class="mb-4 m-2">Manage Users</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                @if (auth()->user()->role_id === 1)
                <th>Assign Role</th>
                @endif
                <th>Edit User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if (auth()->user()->role_id === 1)
                    <td>
                        <form action="{{ route('update', $user->id) }}" method="POST" class="d-flex bg-transparent">
                            @csrf
                            <select name="role_id" class="form-select me-2" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-purple my-2">Assign</button>
                        </form>
                    </td>
                    @endif
                    <td>
                        <a href="{{ route('edit_users', $user->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@else
<div class="card w-75 my-3 mx-auto text-center">
    <div class="card-body">
        <h5 class="card-title text-danger">You do not have access to this page</h5>
        <a href="/" class="btn btn-primary">Return</a>
    </div>
</div>

@endif
@endauth
