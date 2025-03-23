@extends('layouts.app')

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Your Tasks
        </h3>
        <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add Task
        </a>
    </div>
    <div class="border-t border-gray-200">
        @if ($tasks->count() > 0)
            <ul class="divide-y divide-gray-200">
                @foreach ($tasks as $task)
                    <li class="px-4 py-4 sm:px-6 hover:bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <form action="{{ route('tasks.toggle-complete', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="flex-shrink-0 mr-2">
                                        @if ($task->completed)
                                            <span class="h-5 w-5 rounded-full bg-green-500 flex items-center justify-center ring-2 ring-white">
                                                <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </span>
                                        @else
                                            <span class="h-5 w-5 rounded-full bg-white border-2 border-gray-300"></span>
                                        @endif
                                    </button>
                                </form>
                                <div class="min-w-0 flex-1">
                                    <a href="{{ route('tasks.show', $task->id) }}" class="text-sm font-medium {{ $task->completed ? 'text-gray-400 line-through' : 'text-indigo-600' }}">
                                        {{ $task->title }}
                                    </a>
                                    <p class="text-sm text-gray-500 truncate">
                                        {{ Str::limit($task->description, 50) }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if ($task->due_date)
                                    <p class="text-xs text-gray-500 mr-4">
                                        Due: {{ $task->due_date->format('M d, Y') }}
                                    </p>
                                @endif
                                <div class="flex space-x-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="px-4 py-5 sm:p-6 text-center">
                <p class="text-gray-500">You don't have any tasks yet.</p>
                <a href="{{ route('tasks.create') }}" class="mt-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create your first task
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
