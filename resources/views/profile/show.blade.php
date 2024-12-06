@extends($layout)

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex items-center space-x-4">
        <img src="{{ $user->avatar ?? asset('default-avatar.png') }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-full">
        <div>
            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
            <p class="text-gray-600">{{ '@' . $user->username }}</p>
        </div>
    </div>

    <div class="mt-4">
        <h2 class="text-xl font-semibold">About</h2>
        <p class="text-gray-800">{{ $user->about ?? 'No bio available.' }}</p>
    </div>
</div>
@endsection
