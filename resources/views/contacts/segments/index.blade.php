@extends('layouts.app')

@section('content')
    <h1>Segments</h1>

    <a href="{{ route('segments.create') }}" class="btn btn-primary">Create Segment</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Criteria</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($segments as $segment)
                <tr>
                    <td>{{ $segment->id }}</td>
                    <td>{{ $segment->name }}</td>
                    <td>{{ json_encode($segment->criteria) }}</td>
                    <td>
                        <a href="{{ route('segments.show', $segment->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('segments.edit', $segment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('segments.destroy', $segment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $segments->links() }} <!-- For pagination -->
@endsection
