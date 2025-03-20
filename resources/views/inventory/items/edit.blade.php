<x-layout>
    <h1>Edit Item #{{ $item->id }}</h1>
    <form action="{{ route('inventory.items.update', $item) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <x-input name="part_number" label="Part Number" :value="$item->part_number" required/>
        <x-textarea name="description" label="Description" required>{{ $item->description }}</x-form.textarea>
        <x-input name="quantity" label="Quantity" type="number" :value="$item->quantity" required/>
        <x-input name="unit_cost" label="Unit Cost" type="number" step="0.01" :value="$item->unit_cost" required/>
        <button class="btn">Update</button>
    </form>
</x-layout>
