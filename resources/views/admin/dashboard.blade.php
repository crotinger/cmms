
<x-layout>
    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>
    <div class="grid gap-6 grid-cols-2 md:grid-cols-4">

        <div class="p-6 bg-white rounded shadow">Sales: {{ $salesCount }}</div>
        <div class="p-6 bg-white rounded shadow">Service Orders: {{ $ordersCount }}</div>
        <div class="p-6 bg-white rounded shadow">Inventory Items: {{ $inventoryCount }}</div>
        <div class="p-6 bg-white rounded shadow">Customers: {{ $customersCount }}</div>
    </div>
</x-layout>

