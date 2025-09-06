<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
</head>
<body>
    <h1>Task Details</h1>

    <p><strong>ID:</strong> {{ $task->id }}</p>
    <p><strong>Title:</strong> {{ $task->title }}</p>
    <p><strong>Description:</strong> {{ $task->description ?? '-' }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date ?? '-' }}</p>
    <p><strong>Status:</strong> {{ $task->status ? 'Completed' : 'Pending' }}</p>

    <br>
    <a href="{{ route('task.index') }}">← Back to Task List</a> |
    <a href="{{ route('task.edit', $task->id) }}">Edit</a>
</body>
</html>
