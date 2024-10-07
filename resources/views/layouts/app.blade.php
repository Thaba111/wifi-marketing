<!DOCTYPE html>
<html>
<head>
    <title>App Layout</title>
</head>
<body>
    <div class="container">
        @isset($header)
            <header>
                {{ $header }}
            </header>
        @endisset

        <main>
            @yield('content')  <!-- Replaces $slot -->
        </main>
    </div>
</body>
</html>
