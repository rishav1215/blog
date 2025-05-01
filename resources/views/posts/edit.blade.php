@extends('header.home')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Post</h4>
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

                    <form action="{{ url('/posts/' . $post->id . '/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
                        </div>

                        {{-- Author --}}
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author', $post->author) }}">
                        </div>

                        {{-- Topic --}}
                        <div class="mb-3">
                            <label class="form-label">Topic</label>
                            <select name="topic_id" class="form-select">
                                <option value="">-- Select Topic --</option>
                                @foreach ($topics as $topic)
                                    <option value="{{ $topic->id }}" {{ $post->topic_id == $topic->id ? 'selected' : '' }}>
                                        {{ $topic->topic_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Featured Image --}}
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="featuredImage" class="form-control">
                            @if ($post->featuredImage)
                                <div class="mt-3">
                                    <img src="data:image/jpeg;base64,{{ base64_encode($post->featuredImage) }}"
                                         class="img-thumbnail" style="width: 120px; height: 120px;" alt="Current Image">
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" rows="5" class="form-control">{{ old('content', $post->content) }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="publishCheck" {{ $post->status ? 'checked' : '' }}>
                            <label class="form-check-label" for="publishCheck">
                                Publish
                            </label>
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Update Post
                            </button>
                        </div>
                    </form>
                </div> {{-- card-body --}}
            </div> {{-- card --}}
        </div> {{-- col --}}
    </div> {{-- row --}}
</div> {{-- container --}}
@endsection
