@extends('layouts.template')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-4">TASK LIST</h1>
  
    <div class="grid grid-cols-1 gap-4">
        @foreach ($tasks as $task)
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-2">{{ $task->description }}</h2>
        
            <div class="flex justify-end">
                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                    @csrf@extends('layouts.template')

                    @section('content')
                    <div class="container mx-auto p-4">
                        <h1 class="text-4xl font-bold mb-4 text-gray-100">TASK LIST</h1>
                      
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($tasks as $task)
                            <div class="bg-red-600 dark:bg-gray-800 shadow-md rounded-lg p-4">
                                <h2 class="text-lg font-semibold mb-2 text-gray-100">{{ $task->description }}</h2>
                            
                                <div class="flex justify-end">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg ml-2">Delete</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endsection
                    
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg ml-2">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
