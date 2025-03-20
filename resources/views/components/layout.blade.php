<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Dynamic Navigation Bar -->
    <nav class="bg-gray-800 p-4 text-white flex justify-between">
        <div>
            <a href="{{ url('/admin/dashboard') }}" class="px-3">Home</a>

            @if(auth()->check())
                @can('manage users')
                    <a href="{{ url('/admin/dashboard') }}" class="px-3">Admin</a>
                @endcan

                @can('view sales')
                    <a href="{{ url('/sales') }}" class="px-3">Sales</a>
                @endcan

                @can('manage service orders')
                    <a href="{{ url('/service/orders') }}" class="px-3">Service Orders</a>
                @endcan

                @can('manage inventory')
                    <a href="{{ url('/inventory/items') }}" class="px-3">Inventory</a>
                @endcan

                @can('manage roles')
                    <a href="{{ url('/admin/roles') }}" class="px-3">Roles & Permissions</a>
                @endcan
            @endif
        </div>

        <div>
            @if(auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-3">Login</a>
            @endif
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        {{ $slot }}
    </div>

</body>
</html>
