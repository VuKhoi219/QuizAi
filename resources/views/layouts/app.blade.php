<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Application')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <h1>My Application</h1>
    <nav>
        <ul>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <!-- Add other navigation items here -->
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} My Application</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


