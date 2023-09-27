@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users</h1>

        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach ($users as $user)
                        <li class="list-group-item">
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p>Email: {{ $user->email }}</p>
                        </li>
                    @endforeach
                </ul>

                {{ $users->links() }}
            </div>

            <div class="col-md-4">
                <!-- Форма для создания пользователя -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add User</h5>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
