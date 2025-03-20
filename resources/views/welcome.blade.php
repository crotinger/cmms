<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - CMMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-cover bg-center flex flex-col justify-between" style="background-image: url('{{ asset('images/background.jpg') }}');">

    <!-- Navigation Bar -->
    <nav class="bg-gray-800 p-4 text-white flex justify-between">
        <div>
            <a href="{{ url('/') }}" class="px-3">Home</a>

            @auth
                @if(auth()->user()->hasRole('super-admin'))
                    <a href="{{ url('/admin/dashboard') }}" class="px-3">Admin</a>
                @endif
                @if(auth()->user()->hasRole('sales-manager') || auth()->user()->hasRole('sales-representative'))
                    <a href="{{ url('/sales') }}" class="px-3">Sales</a>
                @endif
                @if(auth()->user()->hasRole('service-manager') || auth()->user()->hasRole('service-technician'))
                    <a href="{{ url('/service/orders') }}" class="px-3">Service</a>
                @endif
                @if(auth()->user()->hasRole('inventory-manager'))
                    <a href="{{ url('/inventory/items') }}" class="px-3">Inventory</a>
                @endif
                <a href="{{ url('/admin/roles') }}" class="px-3">Roles & Permissions</a>
            @endauth
        </div>

        <div>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-3">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Login Box -->
    <div class="flex justify-center items-center flex-grow">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-semibold mb-4 text-center">Welcome to CMMS</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required class="w-full border p-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" required class="w-full border p-2 rounded">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
