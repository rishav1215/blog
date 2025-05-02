@extends('header.home')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    
    @include('sidebar')


    <main class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-center mb-10">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-blue-600 text-white px-4 py-2 font-semibold flex items-center">
                    <i class="bi bi-file-earmark-text mr-2"></i> Manage Posts
                </div>
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Total Posts</h2>
                    <p class="text-4xl font-bold text-blue-700 mb-4">{{ $totalPosts }}</p>
                    <a href="{{ route('posts.manageposts') }}" class="block w-full text-center bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 rounded mb-2">Manage Posts</a>
                    <a href="{{ route('posts.create') }}" class="block w-full text-center bg-green-100 hover:bg-green-200 text-green-700 py-2 rounded">Create New Post</a>
                </div>
            </div>

            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-yellow-400 text-gray-900 px-4 py-2 font-semibold flex items-center">
                    <i class="bi bi-people-fill mr-2"></i> Manage Users
                </div>
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Total Users</h2>
                    <p class="text-4xl font-bold text-yellow-600 mb-4">{{ $totalUsers }}</p>
                    <a href="#" class="block w-full text-center bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 rounded mb-2">Manage Users</a>
                    <a href="#" class="block w-full text-center bg-green-100 hover:bg-green-200 text-green-700 py-2 rounded">Create New User</a>
      i     </div>
            </div>

            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-green-600 text-white px-4 py-2 font-semibold flex items-center">
                    <i class="bi bi-tags-fill mr-2"></i> Manage Topics
                </div>
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Total Topics</h2>
                    <p class="text-4xl font-bold text-green-700 mb-4">{{ $totalTopics }}</p>
                    <a href="{{ route('topics.index') }}" class="block w-full text-center bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 rounded mb-2">Manage Topics</a>
                    <a href="{{ route('topics.create') }}" class="block w-full text-center bg-green-100 hover:bg-green-200 text-green-700 py-2 rounded">Create New Topic</a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
