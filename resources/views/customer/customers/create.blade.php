<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Add New Customer</h1>
    <form action="{{ route('customer.customers.store') }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        <x-input name="name" label="Name" required />
        <x-input name="email" label="Email" type="email" required />
        <x-input name="phone" label="Phone" />
        <x-input name="address" label="Address" />
        <button class="btn">Save Customer</button>
        <a href="{{ route('customer.customers.index') }}" class="underline ml-4">Cancel</a>
    </form>
</x-layout>
