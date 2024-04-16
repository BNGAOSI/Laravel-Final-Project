<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen">
    <div class="bg-blue-500 text-white">
        <div class="container mx-auto p-4">
            <nav class="flex justify-between items-center">
                <!-- Navigation Links -->
                <ul class="flex space-x-4">
                    <li>
                        <a href="{{ route('tasks.index') }}" class="hover:text-gray-300">Task List</a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.create') }}" class="hover:text-gray-300">Create Task</a>
                    </li>
                </ul>
               
                <div>
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">Logout</button>
                    </form>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
    
    <div>
        @yield('content')
    </div>
</body>
</html>
