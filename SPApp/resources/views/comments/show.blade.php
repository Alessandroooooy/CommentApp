@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Comment Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user->name }}</h5>
                <p class="card-text">{{ $comment->text }}</p>
            </div>
        </div>
    </div>
@endsection
