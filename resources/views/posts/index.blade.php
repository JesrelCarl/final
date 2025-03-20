@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Your Posts</h1>
        <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">New Post</a>
    </div>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow">
        @foreach ($posts as $post)
            <div class="mb-4 p-4 border-b">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p class="text-gray-600">{{ $post->content }}</p>
                <div class="mt-2">
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
