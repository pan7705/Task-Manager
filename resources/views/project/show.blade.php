<!DOCTYPE html>
<html>
<head>
    <title>Project Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Project Details</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3>{{ $project->name }}</h3>
            <p class="text-muted">Created at: {{ $project->created_at->format('d M Y') }}</p>

            <p><strong>Description:</strong></p>
            <p>{{ $project->description ?? '-' }}</p>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('project.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
