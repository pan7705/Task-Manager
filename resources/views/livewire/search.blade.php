<div>
    <input wire:model.live="search" type="text" class="form-control mb-3" placeholder="Search tasks..."/>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Project</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date ?? '-' }}</td>
                            <td>
                                @if($task->status)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            <td>{{ $task->category->name ?? '-' }}</td>
                            <td>{{ $task->project->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('task.show', $task->id) }}" class="btn btn-sm btn-info text-white">View</a>
                                @can('update', $task)
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan
                                <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
