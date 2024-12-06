@extends('layouts.admin')

@section('content')
<div class="container mx-auto my-8">
    <div class="bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-semibold">Name</label>
                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                       class="w-full px-4 py-2 border rounded-lg shadow-sm">
            </div>

            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700">
                Save Changes
            </button>
        </form>
    </div>
</div>
@endsection
