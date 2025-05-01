@extends('header.home')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Admin Dashboard</h1>

    <div class="row g-4">
        <!-- Posts Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-file-earmark-text"></i> Manage Posts
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Posts</h5>
                    <p class="card-text display-6">{{ $totalPosts }}</p>
                    <a href="{{ url('/posts/manageposts') }}" class="btn btn-outline-primary w-100 mb-2">Manage Posts</a>
                    <a href="{{ url('/posts/create') }}" class="btn btn-outline-success w-100">Create New Post</a>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark">
                    <i class="bi bi-people-fill"></i> Manage Users
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-6">{{ $totalUsers }}</p>
                    <a href="#" class="btn btn-outline-primary w-100 mb-2">Manage Users</a>
                    <a href="#" class="btn btn-outline-success w-100">Create New User</a>
                </div>
            </div>
        </div>

        <!-- Topics Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-tags-fill"></i> Manage Topics
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Topics</h5>
                    <p class="card-text display-6">{{ $totalTopics }}</p>
                    <a href="{{ url('/topics') }}" class="btn btn-outline-primary w-100 mb-2">Manage Topics</a>
                    <a href="{{ route('topics.create') }}" class="btn btn-outline-success w-100">Create New Topic</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
