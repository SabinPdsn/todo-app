<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the tasks.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Todo::create([
            'title' => $request->title,
            'completed' => false,
        ]);

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified task.
     */
    public function show($id)
    {
        // Fetch the todo by its ID
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update([
            'title' => $request->title,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
