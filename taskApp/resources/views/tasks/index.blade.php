@extends('layouts.app')

@section('content')

@section('content')
	<h1 class="text-2xl font-semibold text-center">All Tasks</h1>

	<ul>
		@forelse($tasks as $task)
		<li class="mb-2 text-center">
			{{ $task->task_name }}
		</li>
		@empty
		<li>No tasks yet.</li>
		@endforelse
	</ul>

	<div class="mt-4">
		<a href="{{ route('tasks.create') }}" class="bg-blue-100 text-black px-4 py-2 rounded border-double hover:bg-blue-500">
			Create a New Task
		</a>
	</div>
	<!-- Content for displaying tasks goes here -->

@endsection
