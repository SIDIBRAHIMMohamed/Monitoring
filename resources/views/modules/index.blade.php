@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-3">
        <a href="{{ route('modules.create') }}" class="btn btn-primary">Add Module</a>
    </div>
    <h1>Modules List</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($modules as $module)
            <tr class="{{ $module->status ? '' : 'table-danger' }}">
                <td>{{ $module->name }}</td>
                <td>{{ $module->description }}</td>
                <td>{{ $module->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('modules.show', $module->Id_Module) }}" class="btn btn-info">View</a>
                    <a href="{{ route('modules.edit', $module->Id_Module) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('modules.confirm-delete', $module->Id_Module) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>
</div>
@endsection
