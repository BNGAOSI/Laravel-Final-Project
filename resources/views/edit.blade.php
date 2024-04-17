@extends('layouts.template')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4 text-gray-100">Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="description" class="block text-lg font-medium text-gray-100">Task Description</label>
            <input type="text" id="description" name="description" value="{{ $task->description }}" class="w-full px-4 py-2 mt-2 text-white-700 bg-gray-800 border rounded-lg focus:border-red-500 focus:outline-none focus:bg-gray-700">
        </div>
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">Update Task</button>
    </form>
</div>
@endsection
