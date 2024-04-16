@extends('layouts.template')


@section('content')
<div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold mb-4">Create Task</h1>
        <form>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium text-gray-600">Task Description</label>
                <input type="text" id="description" name="description" class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg focus:border-blue-500 focus:outline-none focus:bg-white">
            </div>
        </form>
    </div>
    
    <div class="container mx-auto p-4">
        <button>Create Task</button>
    </div>
@endsection