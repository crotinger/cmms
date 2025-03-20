<x-layout>
    <h1>Service Order Details</h1>
<h1 class="text-4xl font-bold text-blue-600 text-center mt-10">Hello, Tailwind!</h1>
    <ul class="list-disc pl-5">
        <li><strong>ID:</strong> {{ $order->id }}</li>
        <li><strong>Customer:</strong> {{ $order->customer_name }}</li>
        <li><strong>Model:</strong> {{ $order->pivot_model }}</li>
        <li><strong>Date:</strong> {{ $order->service_date->toDateString() }}</li>
        <li><strong>Status:</strong> {{ $order->status }}</li>
        <li><strong>Notes:</strong> {{ $order->notes }}</li>
    </ul>
    <a href="{{ route('service.orders.index') }}" class="underline">Back to List</a>
</x-layout>
