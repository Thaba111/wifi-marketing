@extends('layouts.app')

@section('content')
    <h1>Create Contact</h1>

    <!-- Display success or error messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter name" required 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                   focus:ring focus:ring-blue-300" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter email" required 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                   focus:ring focus:ring-blue-300" value="{{ old('email') }}">
        </div>

        <div>
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" placeholder="Enter phone number" required 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                   focus:ring focus:ring-blue-300" value="{{ old('phone_number') }}">
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" placeholder="Enter location" 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                   focus:ring focus:ring-blue-300" value="{{ old('location') }}">
        </div>

        <div>
            <label for="segment_id" class="block text-sm font-medium text-gray-700">Segment</label>
            <select name="segment_id" id="segment_id" required 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm 
                    focus:ring focus:ring-blue-300">
                <option value="">Select Segment</option>
                @foreach ($segments as $segment)
                    <option value="{{ $segment->id }}" {{ old('segment_id') == $segment->id ? 'selected' : '' }}>
                        {{ $segment->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent 
                rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Create Contact
        </button>
    </form>
@endsection
