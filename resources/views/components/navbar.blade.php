<nav class="bg-gray-800 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-white text-lg font-semibold">CMMS</a>

        <ul class="flex space-x-4">
            @auth
                <li><a href="{{ route('dashboard') }}" class="text-white">Dashboard</a></li>
                @can('viewAny', App\Models\ServiceOrder::class)
                    <li><a href="{{ route('service.orders.index') }}" class="text-white">Service Orders</a></li>
                @endcan
                @can('viewAny', App\Models\InventoryItem::class)
                    <li><a href="{{ route('inventory.items.index') }}" class="text-white">Inventory</a></li>
                @endcan
                @can('viewAny', App\Models\Sale::class)
                    <li><a href="{{ route('sales.index') }}" class="text-white">Sales</a></li>
                @endcan
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                <li><a href="{{ route('register') }}" class="text-white">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>
