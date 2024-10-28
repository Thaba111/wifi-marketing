{{-- resources/views/settings/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Setting: {{ $setting->key }}</h1>

    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="key">Key</label>
            <input type="text" name="key" id="key" class="form-control" value="{{ $setting->key }}" required>
        </div>
        <div class="form-group">
            <label for="value">Value (array input, comma-separated)</label>
            @php
                $value = unserialize($setting->value);
            @endphp
            @foreach ($value as $index => $val)
                <input type="text" name="value[]" class="form-control" value="{{ $val }}">
            @endforeach
            <small class="form-text text-muted">You can enter multiple values separated by commas.</small>
        </div>
        <button type="submit" class="btn btn-warning">Update Setting</button>
    </form>
</div>
@endsection
