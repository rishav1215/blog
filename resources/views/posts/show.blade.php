@extends('header.home')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('home') }}" class="text-decoration-none text-primary mb-4 d-inline-bloc btn btn-warning">

            ← Back to all posts
        </a>

        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title h3">{{ $post->title }}</h1>
                <p class="text-muted mb-3">
                    By {{ $post->author }} |
                    Topic: {{ $post->topic->topic_name ?? 'Unknown' }} |
                    {{ $post->created_at->format('d M, Y') }}
                </p>


                @if ($post->featuredImage)
                    <img src="data:image/jpeg;base64,{{ base64_encode($post->featuredImage) }}" alt="Featured Image"
                        class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover; width: 100%;">
                @endif

                <div class="mb-4" style="white-space: pre-line;">
                    {{ $post->content }}
                </div>

                <!-- <div class="d-flex gap-2 mt-4">
                    <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="btn btn-warning">
                        Edit
                    </a>
                    <a href="{{ url('/posts/' . $post->id . '/delete') }}"
                       class="btn btn-danger"
                       onclick="return confirm('Are you sure?')">
                        Delete
                    </a>
                </div> -->
            </div>
        </div>
    </div>
@endsection