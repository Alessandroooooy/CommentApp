@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to Your App</h1>
        <p>This is the home page of your application.</p>
        <a href="{{ route('comments.index') }}" class="btn btn-primary">Start Application</a>
    </div>
@endsection
