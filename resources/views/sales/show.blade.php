<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Sale Details</h1>

    <div class="space-y-2">
        <p><strong>ID:</strong> {{ $sale->id }}</p>
        <p><strong>Customer:</strong> {{ $sale->customer_name }}</p>
        <p><strong>Pivot Model:</strong> {{ $sale->pivot_model }}</p>
        <p><strong>Amount:</strong> ${{ number_format($sale->amount, 2) }}</p>
        <p><strong>Sale Date:</strong> {{ $sale->sale_date->format('Y-m-d') }}</p>
    </div>

    <a href="{{ route('sales.index') }}" class="mt-4 inline-block underline">Back to Sales</a>
</x-layout>
