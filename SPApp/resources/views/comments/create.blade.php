@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Comment</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_name" placeholder="User Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="text" placeholder="Comment Text" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection


