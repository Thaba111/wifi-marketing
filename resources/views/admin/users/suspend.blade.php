@extends('layouts.admin')

@section('content')
    <h1>Suspend User</h1>

    <form action="{{ route('admin.suspend', $user->id) }}" method="POST">
    @csrf
    <label for="reason">Reason for Suspension:</label>
    <textarea name="reason" id="reason" required></textarea>
    <button type="submit">Suspend User</button>
</form>
@if($user->is_suspended && $user->suspension_reason)
    <p><strong>Suspension Reason:</strong> {{ $user->suspension_reason }}</p>
@endif

@endsection



