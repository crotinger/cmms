<x-layout>
    <h1>Edit Service Order #{{ $order->id }}</h1>
    <form action="{{ route('service.orders.update', $order) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <x-input name="customer_name" label="Customer Name" :value="$order->customer_name" required/>
        <x-input name="pivot_model" label="Pivot Model" :value="$order->pivot_model" required/>
        <x-input name="service_date" label="Service Date" type="date" :value="$order->service_date->toDateString()" required/>
        <x-input name="status" label="Status" :value="$order->status" required/>
        <x-textarea name="notes" label="Notes">{{ $order->notes }}</x-textarea>
        <button class="btn">Update Order</button>
        <a href="{{ route('service.orders.index') }}" class="underline">Cancel</a>
    </form>
</x-layout>
