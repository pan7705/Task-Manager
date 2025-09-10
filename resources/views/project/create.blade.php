<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Add New Project</h1>

    {{-- Back button --}}
    <div class="mb-3">
        <a href="{{ route('project.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('project.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Save Project</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
