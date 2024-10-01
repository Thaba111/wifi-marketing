@extends('layouts.app')

@section('content')
    <h1>Segment: {{ $segment->name }}</h1>

    <h3>Criteria</h3>
    <pre>{{ json_encode($segment->criteria, JSON_PRETTY_PRINT) }}</pre>

    <h3>Filtered Contacts</h3>
    <a href="{{ route('segments.filtered', $segment->id) }}" class="btn btn-success">View Filtered Contacts</a>

    <a href="{{ route('segments.index') }}" class="btn btn-primary">Back to Segments</a>
@endsection
