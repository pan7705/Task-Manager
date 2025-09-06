<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Add New Task</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form untuk tambah task --}}
    <form action="{{ route('task.store') }}" method="POST">
        @csrf

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Due Date:</label><br>
        <input type="date" name="due_date" value="{{ old('due_date') }}"><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Pending</option>
            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Completed</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('task.index') }}">← Back to Task List</a>
</body>
</html>
