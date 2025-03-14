<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
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

        $query = Name::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('aka', 'like', "%" . $search . '%')
                    ->orWhere('attributes', 'like', '%' . $search . '%')
                    ->orWhere('materials_required', 'like', '%' . $search . '%');
            });
        }

        switch ($sort) {
            case 'birth_date':
                $query->orderBy('birth_date', 'asc');
                break;
            case 'first_name':
                $query->orderBy('first_name', 'asc');
                break;
            case 'aka':
                $query->orderBy('aka', 'asc');
                break;
            default:
                $query->orderBy('first_name', 'asc');
        }
        $tasks = $query->get();

        return view('names.index', compact('names', 'search', 'sort'));

        // Return a view (e.g., resources/views/tasks/index.blade.php)
        // with the tasks data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new task
        return view('names.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'aka' => 'nullable|string|max_255',
            'birth_date' => 'nullable|date',
            'attributes' => 'nullable|string|max:255',
        ]);

        // Create and save the task
        Name::create($validated);

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
