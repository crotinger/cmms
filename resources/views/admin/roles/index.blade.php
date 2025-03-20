<x-layout>
    <h1 class="text-2xl font-bold mb-4">Roles & Permissions</h1>

    <table class="table-auto w-full bg-white p-4 shadow">
        <thead>
            <tr>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Permissions</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">{{ $role->permissions->pluck('name')->join(', ') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.roles.edit', $role) }}" class="px-3 py-1 bg-blue-500 text-white rounded">Edit</a>
                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
