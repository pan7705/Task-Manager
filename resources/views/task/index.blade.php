@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Task Manager</h1>

    {{-- Flash message kalau ada --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Button tambah task --}}
    <div class="mb-3 d-flex gap-2">
        <a href="{{ route('task.create') }}" class="btn btn-primary">+ Add New Task</a>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Manage Categories</a>
        <a href="{{ route('project.index') }}" class="btn btn-secondary">Manage Projects</a>

    </div>

    @livewire('search')

</div>
@livewireScripts
@endsection


