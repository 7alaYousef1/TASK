@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1>User List App</h1>
    <div class="offset-md-2 col-md-8">
        <div class="card">
            @if (isset($user))
            <div class="card-header">
                Update User
            </div>
            <div class="card-body">
                <!-- Update user Form -->
                <form action="{{ url('update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <!-- user Name -->
                    <div class="mb-3">
                        <label for="user-name" class="form-label">User</label>
                        <input type="text" name="name" id="user-name" class="form-control @error('name') is-invalid @enderror " value="{{ $user->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ $user->email }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Your Password" value="{{ $user->password }}">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>

                        @enderror
                        <br>
                        <!-- Update user Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit me-2"></i>Update user
                            </button>

                        </div>
                </form>
            </div>
            @else
            <div class="card-header">
                Update User
            </div>
            <div class="card-body">
                <!-- Delete user Form -->
                <form action="create" method="POST">
                    @csrf
                    <!-- user Name -->
                    <div class="mb-3">
                        <label for="user-name" class="form-label">User</label>
                        <input type="text" name="name" id="user-name" class="form-control" value="">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Your Password">
                        <!-- Delete user Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Delete User
                            </button>
                        </div>
                </form>
            </div>
            @endif
        </div>

        <!-- Current users -->
        <div class="card mt-4">
            <div class="card-header">
                Current Users
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                <form action="/delete/{{ $user->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                                <form action="/edit/{{ $user->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-info me-2"></i>Edit
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection