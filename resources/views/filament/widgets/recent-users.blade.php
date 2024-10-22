<div class="p-4 bg-white shadow rounded-lg">
    <h3 class="text-lg font-semibold">Recently Registered Users</h3>
    <ul class="mt-3">
        @forelse ($recentUsers as $user)
            <li class="flex justify-between border-b py-2">
                <span>{{ $user->name }}</span>
                <span class="text-sm text-gray-500">{{ $user->created_at->diffForHumans() }}</span>
            </li>
        @empty
            <li class="py-2 text-gray-500">No recent users found.</li>
        @endforelse
    </ul>
</div>
