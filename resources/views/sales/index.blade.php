<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Sales</h1>

    <a href="{{ route('sales.create') }}" class="px-4 py-2 bg-green-500 text-white rounded mb-4 inline-block">New Sale</a>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">ID</th>
                <th class="p-2">Customer</th>
                <th class="p-2">Pivot Model</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Date</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sales as $sale)
                <tr class="border-t">
                    <td class="p-2">{{ $sale->id }}</td>
                    <td class="p-2">{{ $sale->customer_name }}</td>
                    <td class="p-2">{{ $sale->pivot_model }}</td>
                    <td class="p-2">${{ number_format($sale->amount, 2) }}</td>
                    <td class="p-2">{{ $sale->sale_date->format('Y-m-d') }}</td>
                    <td class="p-2 space-x-2">
                        <a href="{{ route('sales.show', $sale) }}" class="underline">View</a>
                        <a href="{{ route('sales.edit', $sale) }}" class="underline">Edit</a>
                        <form action="{{ route('sales.destroy', $sale) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this sale?')" class="underline text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="p-4 text-center">No sales found.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
