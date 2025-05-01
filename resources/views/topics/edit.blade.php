@extends('header.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Topic</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('topics.update', $topic->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="topic_name" class="col-md-4 col-form-label text-md-right">Topic Name</label>

                            <div class="col-md-6">
                                <input id="topic_name" type="text" 
                                       class="form-control @error('topic_name') is-invalid @enderror" 
                                       name="topic_name" value="{{ old('topic_name', $topic->topic_name) }}" 
                                       required autocomplete="topic_name" autofocus>

                                @error('topic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" 
                                          class="form-control @error('description') is-invalid @enderror" 
                                          name="description" rows="3">{{ old('description', $topic->description) }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Topic
                                </button>
                                <a href="{{ route('topics.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection