<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Add New Category</h1>

    {{-- Error messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   class="form-control" placeholder="Enter category name" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>
    