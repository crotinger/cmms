<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Service Orders</h1>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">ID</th>
                <th class="p-2">Customer</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="border-t">
                    <td class="p-2">{{ $order->id }}</td>
                    <td class="p-2">{{ $order->customer_name }}</td>
                    <td class="p-2">{{ $order->status }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('service.orders.show', $order) }}" class="underline">View</a>
                        <a href="{{ route('service.orders.edit', $order) }}" class="underline">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
