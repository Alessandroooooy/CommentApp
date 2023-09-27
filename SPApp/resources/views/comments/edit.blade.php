@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Comment</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <textarea class="form-control" name="text" required>{{ $comment->text }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
