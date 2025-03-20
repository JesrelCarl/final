@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h1 class="text-2xl font-bold">Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="text-blue-500">Create New Task</a>
    <ul>
        @foreach ($tasks as $task)
            <li class="mt-2 p-2 border">
                <a href="{{ route('tasks.show', $task) }}" class="text-lg font-semibold">{{ $task->title }}</a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-500">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
