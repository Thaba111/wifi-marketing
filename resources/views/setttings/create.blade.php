@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Setting</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="key" class="form-label">Key</label>
            <input type="text" class="form-control" id="key" name="key" value="{{ old('key') }}">
            @error('key')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <textarea class="form-control" id="value" name="value">{{ old('value') }}</textarea>
            @error('value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Setting</button>
    </form>
</div>
@endsection
