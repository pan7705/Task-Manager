<!DOCTYPE html>
<html>
<head>
    <title>Category Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Category Details</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Category Name:</h5>
            <p class="card-text fs-5">{{ $category->name }}</p>

            <p class="text-muted mb-2">
                Created at: {{ $category->created_at->format('d M Y, H:i') }} <br>
                Updated at: {{ $category->updated_at->format('d M Y, H:i') }}
            </p>

            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
