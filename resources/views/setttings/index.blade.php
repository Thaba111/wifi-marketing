{{-- resources/views/settings/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Settings</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
                <tr>
                    <td>{{ $setting->key }}</td>
                    <td>
                        @php
                            $value = unserialize($setting->value);
                        @endphp
                        {{-- Display value as a comma-separated string for array values --}}
                        @if (is_array($value))
                            {{ implode(', ', $value) }}
                        @else
                            {{ $value }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('settings.destroy', $setting->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('settings.create') }}" class="btn btn-primary">Add Setting</a>
</div>
@endsection
