{{-- resources/views/contacts/import.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Import Contacts</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('contacts.import.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Upload Excel File</label>
                    <input type="file" name="file" class="form-control" id="file" required>
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Import</button>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
        </div>
    </div>
</div>
@endsection

<style>
    /* Custom Styles */
    .container {
        margin-top: 50px; /* Spacing from the top */
    }

    .card {
        border-radius: 15px; /* Rounded corners for the card */
    }

    .card-body {
        padding: 30px; /* Add some padding */
    }

    .form-label {
        font-weight: bold; /* Make label text bold */
    }

    .btn {
        width: 100%; /* Full-width button */
    }

    /* Optional: Add hover effects */
    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
        border-color: #0056b3; /* Border color on hover */
    }
</style>
