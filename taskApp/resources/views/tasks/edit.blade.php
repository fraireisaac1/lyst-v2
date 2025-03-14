@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="grid grid-cols-2 gap-6">
        @csrf
        @method('PUT') {{-- Important for updating (PUT/PATCH) --}}

        <div class="mb-4">
            <label class="block" for="task_name">Task Name:</label>
            <input type="text" name="task_name" id="task_name"
                value="{{ old('task_name', $task->task_name) }}" class="p-2 rounded md border border-teal-600 block">
            @error('task_name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block" for="task_location">Location:</label>
            <input type="text" name="task_location" id="task_location"
                value="{{ old('task_location', $task->task_location) }}" class="p-2 rounded md border border-teal-600 block">
            @error('task_location')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="time_complexity" class="block">Time Complexity:</label>
            <input type="number" name="time_complexity" id="time_complexity"
                value="{{ old('time_complexity', $task->time_complexity) }}" min="1" max="5" class="p-2 rounded md border border-teal-600 px-3 py-2">
            @error('time_complexity')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="materials_required" class="block">Materials Required:</label>
            <input type="text" name="materials_required" id="materials_required"
                value="{{ old('materials_required', $task->materials_required) }}" class="p-2 rounded md border border-teal-600 block">
            @error('materials_required')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deadline" class="block">Deadline:</label>
            <input type="date" name="deadline" id="deadline"
                value="{{ old('deadline', $task->deadline) }}" class="p-2 rounded md border border-teal-600 block">
            @error('deadline')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="priority" class="block">Priority:</label>
            <input type="number" name="priority" id="priority"
                value="{{ old('priority', $task->priority) }}" min="1" max="3" class="p-2 rounded md border border-teal-600 block">
            @error('priority')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block">Category:</label>
            <input type="text" name="category" id="category"
                value="{{ old('category', $task->category) }}" class="p-2 rounded md border border-teal-600 block">
            @error('category')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 grid content-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-400">Update Task</button>
        </div>
    </form>

    <br>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-400 ">
            Delete Task
        </button>
    </form>
@endsection