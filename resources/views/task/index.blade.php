@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Task Manager</h1>

    {{-- Flash message kalau ada --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Button tambah task --}}
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('task.create') }}" class="btn btn-primary">+ Add New Task</a>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Manage Categories</a>
        <a href="{{ route('project.index') }}" class="btn btn-secondary">Manage Projects</a>
        <form action="{{ route('task.index') }}" method="GET" class="ms-auto d-flex" style="max-width: 300px;">
            <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="{{ request()->search }}">
            <button type="submit" class="btn btn-outline-secondary ms-2">Search</button>
            @if (request()->has('search') && request()->search != '')
                <a href="{{ route('task.index') }}" class="btn btn-outline-danger ms-2">Clear</a>
            @endif
        </form>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Project</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date ?? '-' }}</td>
                            <td>
                                @if($task->status)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>{{ $task->category->name ?? '-' }}</td> {{-- Object Relational Mapping (ORM) --}}
                            <td>{{ $task->project->name ?? '-' }}</td> {{-- Object Relational Mapping (ORM) --}}
                            <td>
                                <a href="{{ route('task.show', $task->id) }}" class="btn btn-sm btn-info text-white">View</a>
                                @can('update', $task)
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


