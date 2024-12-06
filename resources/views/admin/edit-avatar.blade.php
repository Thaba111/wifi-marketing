@extends('layouts.admin')

@section('content')
<div class="container mx-auto my-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Avatar</h1>

        <form action="{{ route('admin.avatar.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="avatar" class="block text-gray-700 font-semibold">Upload Avatar</label>
                <input type="file" name="avatar" id="avatar" 
                       class="w-full px-4 py-2 border rounded-lg shadow-sm">
            </div>

            <button type="submit" 
                    class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700">
                Save Avatar
            </button>
        </form>
    </div>
</div>
@endsection
