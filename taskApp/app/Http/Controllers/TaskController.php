<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get all tasks
        // $tasks = Task::all();
        $search = $request->input('search');
        $sort = $request->input('sort');

        $query = Task::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('task_name', 'like', '%' . $search . '%')
                    ->orWhere('task_location', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%')
                    ->orWhere('materials_required', 'like', '%' . $search . '%');
            });
        }

        switch ($sort) {
            case 'deadline':
                $query->orderBy('deadline', 'asc');
                break;
            case 'task_name':
                $query->orderBy('task_name', 'asc');
                break;
            case 'category':
                $query->orderBy('category', 'asc');
                break;
            default:
                $query->orderBy('task_name', 'asc');
        }
        $tasks = $query->get();

        return view('tasks.index', compact('tasks', 'search', 'sort'));

        // Return a view (e.g., resources/views/tasks/index.blade.php)
        // with the tasks data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new task
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_location' => 'nullable|string|max:255',
            'time_complexity' => 'required|integer|min:1|max:5',
            'materials_required' => 'nullable|string',
            'deadline' => 'nullable|date',
            'priority' => 'nullable|integer|min:1|max:3',
            'category' => 'nullable|string|max:255',
        ]);

        // Create and save the task
        Task::create($validated);

        // Redirect or return
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display a specific task.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * leave the follwing empty for now
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'task_location' => 'nullable|string|max:255',
            'time_complexity' => 'required|integer|min:1|max:255',
            'materials_required' => 'nullable|string',
            'deadline' => 'nullable|date',
            'priority' => 'nullable|integer|min:1|max:3',
            'category' => 'nullable|string|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfuly!');
    }

    /**
     * Remove the specified task.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
