<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- For Laravel Vite --}}
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between p-4">
            <h1 class="text-xl font-bold">Wave Admin</h1>
            <nav>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

            </nav>
        </div>
    </header>
    <main class="container mx-auto py-8">
        @yield('content')
    </main>
    <footer class="text-center text-gray-500 py-4">
        &copy; {{ date('Y') }} Wave. All Rights Reserved.
    </footer>
</body>
</html>
