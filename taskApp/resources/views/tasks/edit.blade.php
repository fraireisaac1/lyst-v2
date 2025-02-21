@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Important for updating (PUT/PATCH) --}}

        <div class="mb-4">
            <label for="task_name">Task Name:</label>
            <input type="text" name="task_name" id="task_name"
                value="{{ old('task_name', $task->task_name) }}">
            @error('task_name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="task_location">Location:</label>
            <input type="text" name="task_location" id="task_location"
                value="{{ old('task_location', $task->task_location) }}">
            @error('task_location')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="time_complexity">Time Complexity:</label>
            <input type="number" name="time_complexity" id="time_complexity"
                value="{{ old('time_complexity', $task->time_complexity) }}" min="1" max="5">
            @error('time_complexity')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="materials_required">Materials Required:</label>
            <input type="text" name="materials_required" id="materials_required"
                value="{{ old('materials_required', $task->materials_required) }}">
            @error('materials_required')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" id="deadline"
                value="{{ old('deadline', $task->deadline) }}">
            @error('deadline')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="priority">Priority:</label>
            <input type="number" name="priority" id="priority"
                value="{{ old('priority', $task->priority) }}" min="1" max="3">
            @error('priority')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category">Category:</label>
            <input type="text" name="category" id="category"
                value="{{ old('category', $task->category) }}">
            @error('category')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-400">Update Task</button>
    </form>

    <br>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-400">
            Delete Task
        </button>
    </form>
@endsection