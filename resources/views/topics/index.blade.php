@extends('header.home')

@section('content')
<div class="flex min-h-screen">
    
    
    @include('sidebar')

    <div class="flex-1 p-6 bg-gray-50">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">All Topics</h1>
            <a href="{{ route('topics.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Create New Topic
            </a>
        </div>

       
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($topics->count())
            <div class="overflow-x-auto bg-white p-4 shadow-md rounded">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topics as $topic)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $topic->topic_name }}</td>
                                <td class="px-4 py-2 text-gray-700">
                                    {{ $topic->description ?? 'No description' }}
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('topics.edit', $topic->id) }}" class="text-blue-600 hover:underline">
                                            Edit
                                        </a>
                                        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this topic?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded mt-4">
                No topics found.
            </div>
        @endif
    </div>
</div>
@endsection
