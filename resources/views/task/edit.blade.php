<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form update --}}
    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
        <br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
        <br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
        <br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="0" {{ old('status', $task->status) == 0 ? 'selected' : '' }}>Pending</option>
            <option value="1" {{ old('status', $task->status) == 1 ? 'selected' : '' }}>Completed</option>
        </select>
        <br><br>

        <button type="submit">Update Task</button>
    </form>

    <br>
    <a href="{{ route('task.index') }}">← Back to Task List</a>
</body>
</html>
