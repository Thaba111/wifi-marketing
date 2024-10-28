{{-- resources/views/settings/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Setting</h1>

    <form action="{{ route('settings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="key">Key</label>
            <input type="text" name="key" id="key" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="value">Value (array input, comma-separated)</label>
            <input type="text" name="value[]" id="value" class="form-control" required>
            <input type="text" name="value[]" class="form-control" placeholder="Another value (optional)">
            <input type="text" name="value[]" class="form-control" placeholder="Another value (optional)">
            <small class="form-text text-muted">You can enter multiple values separated by commas.</small>
        </div>
        <button type="submit" class="btn btn-primary">Add Setting</button>
    </form>
</div>
@endsection
