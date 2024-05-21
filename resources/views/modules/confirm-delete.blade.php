@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Confirm Delete</h1>
    <p>Are you sure you want to delete this module?</p>
    <form action="{{ route('modules.destroy', $module->Id_Module) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirm Delete</button>
        <a href="#" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
