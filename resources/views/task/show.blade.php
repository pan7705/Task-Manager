<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Task Details</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">{{ $task->title }}</h4>
            <p class="card-text"><strong>Description:</strong> {{ $task->description ?? '-' }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date ?? '-' }}</p>
            <p class="card-text"><strong>Category:</strong> {{ $task->category->name ?? '-' }}</p>
            <p class="card-text"><strong>Status:</strong>
                @if($task->status)
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-warning text-dark">Pending</span>
                @endif
            </p>
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('task.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
