@extends('header.home')

@section('content')
<div class="container">
    <h1 class="my-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Posts</h5>
                    <p class="card-text">View, edit, or delete existing posts.</p>
                    <a href="{{ url('/posts/manageposts') }}" class="btn btn-primary">Manage Posts</a>
                    <a href="{{ url('/posts/create') }}" class="btn btn-success">Create New Post</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View, edit, or delete users.</p>
                    <a href="#" class="btn btn-primary">Manage Users</a>
                    <a href="#" class="btn btn-success">Create New User</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Topics</h5>
                    <p class="card-text">View, edit, or delete topics.</p>
                    <a href="{{ url('/topics') }}" class="btn btn-primary">Manage Topics</a>
                    <a href="{{ route('topics.create') }}" class="btn btn-success">Create New Topic</a>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
