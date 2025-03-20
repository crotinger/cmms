<x-layout>
    <h1>Add Inventory Item</h1>
    <form action="{{ route('inventory.items.store') }}" method="POST" class="space-y-4">
        @csrf
        <x-input name="part_number" label="Part Number" required/>
        <x-textarea name="description" label="Description" required/>
        <x-input name="quantity" label="Quantity" type="number" required/>
        <x-input name="unit_cost" label="Unit Cost" type="number" step="0.01" required/>
        <button class="btn">Save</button>
    </form>
</x-layout>
