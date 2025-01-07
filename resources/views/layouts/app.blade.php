<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Default Title')</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <header>
        <nav>
            <!-- Add navigation here -->
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('flights.index') }}">Flights</a>
        </nav>
    </header>

    <main>
        @yield('content') <!-- This is where your @section('content') will go -->
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Flight Management System</p>
    </footer>

    <!-- Add your JavaScript links here -->
</body>
</html>
