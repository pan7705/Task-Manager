<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">All Categories</h1>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('category.create') }}" class="btn btn-primary">+ Add New Category</a>
        <a href="{{ route('task.index') }}" class="btn btn-secondary">← Back to Tasks</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
