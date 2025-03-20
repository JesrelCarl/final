@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="w-full p-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" class="w-full p-2 border rounded-lg" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Update</button>
    </form>
</div>
@endsection
