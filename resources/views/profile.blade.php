@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center">
        <img src="{{ $user->avatar }}" alt="User Avatar" class="w-20 h-20 rounded-full">
        <div class="ml-4">
            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
            <p class="text-gray-600">@{{ $user->username }}</p>
            <p class="mt-2">{{ $user->about }}</p>
        </div>
    </div>
</div>
@endsection
