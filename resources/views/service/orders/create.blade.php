<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Create Service Order</h1>
    <form action="{{ route('service.orders.store') }}" method="POST" class="space-y-4">
        @csrf
        <x-input name="customer_name" label="Customer Name" required/>
        <x-input name="pivot_model" label="Pivot Model" required/>
        <x-input name="service_date" label="Service Date" type="date" required/>
        <x-input name="status" label="Status" value="scheduled" required/>
        <x-textarea name="notes" label="Notes"/>
        <button class="btn">Save Order</button>
        <a href="{{ route('service.orders.index') }}" class="underline">Cancel</a>
    </form>
</x-layout>
