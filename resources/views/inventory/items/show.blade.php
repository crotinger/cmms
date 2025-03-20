<x-layout>
    <h1>Item Details</h1>
    <ul class="list-disc pl-5">
        <li><strong>ID:</strong> {{ $item->id }}</li>
        <li><strong>Part #:</strong> {{ $item->part_number }}</li>
        <li><strong>Description:</strong> {{ $item->description }}</li>
        <li><strong>Quantity:</strong> {{ $item->quantity }}</li>
        <li><strong>Unit Cost:</strong> ${{ number_format($item->unit_cost,2) }}</li>
    </ul>
    <a href="{{ route('inventory.items.index') }}" class="underline">Back</a>
</x-layout>
