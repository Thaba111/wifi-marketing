@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone_number }}</td>
                    <td>{{ $contact->location }}</td>
                    <td>
                        <!-- Add action buttons (edit, delete) here -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
