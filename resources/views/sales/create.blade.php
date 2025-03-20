<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Add New Sale</h1>

    <form action="{{ route('sales.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf

        <label>Name:
            <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="w-full border p-2" required>
            @error('customer_name')<p class="text-red-600">{{ $message }}</p>@enderror
        </label>

        <label>Pivot Model:
            <input type="text" name="pivot_model" value="{{ old('pivot_model') }}" class="w-full border p-2" required>
            @error('pivot_model')<p class="text-red-600">{{ $message }}</p>@enderror
        </label>

        <label>Amount:
            <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" class="w-full border p-2" required>
            @error('amount')<p class="text-red-600">{{ $message }}</p>@enderror
        </label>

        <label>Sale Date:
            <input type="date" name="sale_date" value="{{ old('sale_date') }}" class="w-full border p-2" required>
            @error('sale_date')<p class="text-red-600">{{ $message }}</p>@enderror
        </label>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save Sale</button>
        <a href="{{ route('sales.index') }}" class="ml-4 underline">Cancel</a>
    </form>
</x-layout>
