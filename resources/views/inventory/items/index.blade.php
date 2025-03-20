<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Inventory</h1>
    <a href="{{ route('inventory.items.create') }}" class="btn">New Item</a>
    <table class="table-auto w-full mt-4">
        <thead><tr><th>ID</th><th>Part #</th><th>Description</th><th>Qty</th><th>Cost</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->part_number }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->unit_cost,2) }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('inventory.items.show', $item) }}">View</a>
                        <a href="{{ route('inventory.items.edit', $item) }}">Edit</a>
                        <form action="{{ route('inventory.items.destroy', $item) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete?')" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No items.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layout>
