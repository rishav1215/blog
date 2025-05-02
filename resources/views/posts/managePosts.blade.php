@extends('header.home')

@section('content')
<div class="flex min-h-screen">
    
  
    @include('sidebar')

   
    <div class="flex-1 p-6 bg-gray-50">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Manage Posts</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create New Post</a>
        </div>

        <div class="overflow-x-auto bg-white p-4 shadow rounded">
            <table class="min-w-full table-auto border">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                    <th class="px-4 py-2 text-left">Id</th>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Author</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Content</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="border-t">
                        <td class="px-4 py-2">{{ $post->id }}</td>
                            <td class="px-4 py-2">{{ $post->title }}</td>
                            <td class="px-4 py-2">{{ $post->author }}</td>
                            <td class="px-4 py-2">{{ $post->status ? 'Published' : 'Draft' }}</td>
                            <td class="px-4 py-2">
                                @if ($post->featuredImage)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($post->featuredImage) }}" alt="Image" class="w-24 h-auto">
                                @else
                                    <span>No image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ Str::limit(strip_tags($post->content), 50) }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
