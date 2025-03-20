<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Customer Details</h1>
    <ul class="list-disc pl-5">
        <li><strong>ID:</strong> {{ $customer->id }}</li>
        <li><strong>Name:</strong> {{ $customer->name }}</li>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Phone:</strong> {{ $customer->phone }}</li>
        <li><strong>Address:</strong> {{ $customer->address }}</li>
    </ul>
    <a href="{{ route('customer.customers.index') }}" class="underline">Back to Customers</a>
</x-layout>
