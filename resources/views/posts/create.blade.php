@extends('header.home')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📝 Create New Post</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter post title">
                        </div>

                        <!-- Author -->
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="Author name">
                        </div>

                        <!-- Topic -->
                        <div class="mb-3">
                            <label class="form-label">Topic</label>
                            <select name="topic_id" class="form-select">
                                <option value="">-- Select Topic --</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : '' }}>
                                        {{ $topic->topic_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Featured Image -->
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="featuredImage" class="form-control">
                        </div>

                        <!-- Content -->
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="6" placeholder="Write your content here...">{{ old('content') }}</textarea>
                        </div>

                        <!-- Publish Checkbox -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="publishCheck" {{ old('status') ? 'checked' : '' }}>
                            <label class="form-check-label" for="publishCheck">Publish</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="">
                            <button type="submit" class="btn btn-primary">➕ Create Post</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    