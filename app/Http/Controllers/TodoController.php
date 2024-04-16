<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TodoController extends Controller
{
    public function index()
    {
        

        
        $userId = Auth::id();

       
        $tasks = Task::where('user_id', $userId)->get();

        dd($userId);

       
        return view('tasks.index', compact('tasks'));
    }
    

    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {


        $userId = auth()->id();
  
        $request->validate([
            'description' => 'required|string|max:255',
        ]);
    

        $task = Task::create([
            'description' => $request->description,
            'user_id' => auth()->id(), 
        ]);
    
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
