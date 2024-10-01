@extends('layouts.app')

@section('content')
    <h2>Filtered Contacts for Segment</h2>

    @if($contacts->isEmpty())
        <p>No contacts found for this segment.</p>
    @else
        <ul>
            @foreach($contacts as $contact)
                <li>{{ $contact->name }} - {{ $contact->email }} - {{ $contact->location }}</li>
            @endforeach
        </ul>
    @endif
@endsection
