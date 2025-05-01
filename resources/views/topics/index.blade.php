@extends('header.home')

@section('content')
<div class="container">
    <h1>All Topics</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">Create New Topic</a>

    @if($topics->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <td>{{ $topic->topic_name }}</td>
                            <td>{{ $topic->description ?? 'No description' }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-sm btn-primary mr-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this topic?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">No topics found.</div>
    @endif
</div>
@endsection