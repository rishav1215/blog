@extends('header.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Topic</div>

                <div class="card-body ">
                    <form method="POST" action="{{ route('topics.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="topic_name" class="col-md-4 col-form-label text-md-right">Topic Name</label>

                            <div class="col-md-6">
                                <input id="topic_name" type="text" class="form-control @error('topic_name') is-invalid @enderror" name="topic_name" value="{{ old('topic_name') }}" required autocomplete="topic_name" autofocus>

                                @error('topic_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') }}</textarea>

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
                                    Create Topic
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection