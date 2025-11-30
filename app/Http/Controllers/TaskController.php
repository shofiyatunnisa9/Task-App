<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        abort_if($task->user_id !== auth()->id(), 403);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        abort_if($task->user_id !== auth()->id(), 403);

        $request->validate([
            'title' => 'required|max:255'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed') ? 1 : 0,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        abort_if($task->user_id !== auth()->id(), 403);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted');
    }
}
