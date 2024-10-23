@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Setting</h1>
    <form action="{{ route('settings.update', $setting->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $setting->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" value="{{ $setting->role }}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ $setting->location }}">
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" value="{{ $setting->country }}">
        </div>
        <div class="form-group">
            <label for="county">County</label>
            <input type="text" name="county" class="form-control" value="{{ $setting->county }}">
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
