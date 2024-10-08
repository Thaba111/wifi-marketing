@extends('layouts.app')

@section('content')
    <h2>Filtered Contacts for Segment: {{ $segment->name }}</h2>

    @if($contacts->isEmpty())
        <p>No contacts found for this segment.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_number }}</td>
                        <td>{{ $contact->location }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('segments.index') }}" class="btn btn-primary">Back to Segments</a>
@endsection
