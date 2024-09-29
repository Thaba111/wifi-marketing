@extends('layouts.admin')

@section('content')
    <h1>Suspend User</h1>

    <form action="{{ route('admin.users.suspend', $user->id) }}" method="POST">
        @csrf
        @method('POST')

        <div>
            <label for="reason">Suspension Reason:</label>
            <textarea id="reason" name="reason" rows="4" cols="50" required></textarea>
        </div>

        <div>
            <button type="submit">Suspend User</button>
        </div>
    </form>
@endsection
