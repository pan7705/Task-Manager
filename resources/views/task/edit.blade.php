<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Edit Task</h1>

    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Category (Optional)</label>
            <select name="category_id" class="form-select">
                <option value="">-- No Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Project (Optional)</label>
            <select name="project_id" class="form-select">
                <option value="">-- No Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="0" {{ old('status', $task->status) == 0 ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ old('status', $task->status) == 1 ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('task.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>
