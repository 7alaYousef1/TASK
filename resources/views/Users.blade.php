@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="offset-md-2 col-md-8">
        <div class="card">
            @if (isset($user))
            
            <div class="card-header">
                Update user
            </div>
            <div class="card-body">
                <!-- Update user Form -->
                <form action="{{ url('update') }}" method="POST">
                    @CSrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <!-- user Name -->
                    <div class="mb-3">
                        <label for="user-name" class="form-label">user</label>
                        <input type="text" name="name" id="-name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="form-label">user</label>
                        <input type="text" name="email" id="-email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="user-password" class="form-label">user</label>
                        <input type="password" name="password" id="-password" class="form-control" value="{{ $user->password }}">
                    </div>

                    <!-- Update user Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Update user
                        </button>
                    </div>
                </form>
            </div>
            @else

            <div class="card-header">
                New user
            </div>
            <div class="card-body">
                <!-- New user Form -->
                <form action="create" method="POST">
                    @CSrf
                    <!-- user Name -->
                    <div class="mb-3">
                        <label for="user-name" class="form-label">user</label>
                        <input type="text" name="name" id="user-name" class="form-control" value="">
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="form-label">Email</label>
                        <input type="text" name="email" id="user-email" class="form-control" value="">
                    </div>
                    <div class="mb-3">
                        <label for="user-password" class="form-label">Password</label>
                        <input type="password" name="password" id="user-password" class="form-control" value="">
                    </div>

                    <!-- Add user Button -->
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus me-2"></i>Add user
                        </button>
                    </div>
                </form>
            </div>
            @endif
        </div>

        <!-- Current Tasks -->
        <div class="card mt-4">
            <div class="card-header">
                Current users
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <form action="/delete/{{ $user->id }}" method="POST" class="d-inline">
                                    @CSrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                                <form action="/edit/{{ $user->id }}" method="POST" class="d-inline">
                                    @CSrf
                                    <button type="submit" class="btn btn-info">
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