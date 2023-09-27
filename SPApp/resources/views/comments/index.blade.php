@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comments</h1>

        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    @foreach ($comments as $comment)
                        <li class="list-group-item">
                            <h5 class="mb-1">{{ $comment->user->name }}</h5>
                            <p>{{ $comment->text }}</p>
                        </li>
                    @endforeach
                </ul>

                {{ $comments->links() }}
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Comment</h5>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

