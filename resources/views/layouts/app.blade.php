<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <!-- Include Navbar -->
    @include('components.navbar')

    <div class="container mx-auto mt-4">
        @yield('content')
    </div>

</body>
</html>
