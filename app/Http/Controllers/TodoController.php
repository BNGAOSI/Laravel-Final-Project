<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        dd($tasks);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
    
       
        $task = new Task();
        $task->description = $request->description;
        $task->save();
    
       
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }
    

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
    
        $task = Task::findOrFail($id);
        $task->update([
            'description' => $request->description,
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
