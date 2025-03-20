<x-layout>
    <h1 class="text-2xl font-semibold mb-4">Customers</h1>
    <a href="{{ route('customer.customers.create') }}" class="btn">New Customer</a>
    <table class="table-auto w-full mt-4">
        <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Actions</th></tr></thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td class="space-x-2">
                        <a href="{{ route('customer.customers.show', $customer) }}">View</a>
                        <a href="{{ route('customer.customers.edit', $customer) }}">Edit</a>
                        <form action="{{ route('customer.customers.destroy', $customer) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this customer?')" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No customers found.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layout>