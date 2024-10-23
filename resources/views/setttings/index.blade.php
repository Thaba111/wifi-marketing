@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Settings</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('settings.create') }}" class="btn btn-primary">Add New Setting</a>

    <h2>2.6 Settings and Configuration</h2>
    <h3>2.6.1 Features</h3>
    <ul>
        <li>System-wide settings for configuring integrations, branding, notifications, and user preferences.</li>
        <li>API keys and third-party service credentials management.</li>
        <li>Branding options for splash pages and email templates.</li>
    </ul>

    <h3>2.6.2 Database Fields</h3>
    <ul>
        <li>settings</li>
        <li>id (int, primary key, auto-increment)</li>
        <li>key (string, unique)</li>
        <li>value (text)</li>
        <li>created_at (timestamp)</li>
        <li>updated_at (timestamp)</li>
    </ul>

    <h3>All Settings</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Key</th>
                <th>Value</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
                <tr>
                    <td>{{ $setting->id }}</td>
                    <td>{{ $setting->key }}</td>
                    <td>{{ $setting->value }}</td>
                    <td>{{ $setting->created_at }}</td>
                    <td>{{ $setting->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
