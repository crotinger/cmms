<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Edit Customer #{{ $customer->id }}</h1>
    <form action="{{ route('customer.customers.update', $customer) }}" method="POST" class="space-y-4 max-w-md">
        @csrf
        @method('PUT')
        <x-input name="name" label="Name" :value="old('name', $customer->name)" required />
        <x-input name="email" label="Email" type="email" :value="old('email', $customer->email)" required />
        <x-input name="phone" label="Phone" :value="old('phone', $customer->phone)" />
        <x-input name="address" label="Address">{{ old('address', $customer->address) }}</x-input>
        <button class="btn">Update Customer</button>
        <a href="{{ route('customer.customers.index') }}" class="underline ml-4">Cancel</a>
    </form>
</x-layout>
