@extends('header.home')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        {{-- Sidebar - Topics --}}
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Topics
                </div>
                <ul class="list-group list-group-flush">
                @foreach ($topics as $topic)
    <li class="list-group-item {{ isset($activeTopic) && $activeTopic->id == $topic->id ? 'active text-white' : '' }}">
        <a href="{{ url('/topics/' . $topic->id) }}"
           class="text-decoration-none {{ isset($activeTopic) && $activeTopic->id == $topic->id ? 'text-white' : '' }}">
            {{ $topic->topic_name }}
        </a>
    </li>
@endforeach
                </ul>
            </div>
        </div>

        {{-- Main Content - Posts --}}
        <div class="col-md-9">
        <h1 class="mb-4">
    {{ isset($activeTopic) ? 'Posts under: ' . $activeTopic->topic_name : 'All Blog Posts' }}
</h1>


            @if ($posts->isEmpty())
                <div class="alert alert-secondary">No posts available.</div>
            @else
                <div class="row g-4">
                    @foreach ($posts as $post)
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm">
                                @if ($post->featuredImage)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($post->featuredImage) }}"
                                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="Featured Image">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-subtitle text-muted mb-2">
                                        By {{ $post->author }} | Topic : {{ $post->topic->topic_name ?? 'Unknown' }} | {{ $post->created_at->format('d M, Y') }}
                                    </p>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                                    <a href="{{ url('/posts/' . $post->id) }}" class="mt-auto btn btn-outline-primary btn-sm">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
