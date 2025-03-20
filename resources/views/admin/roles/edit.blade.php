<x-layout>
    <h1>Edit Role: {{ $role->name }}</h1>

    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
        @csrf @method('PUT')

        @foreach($permissions as $permission)
            <label>
                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                    {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                {{ $permission->name }}
            </label><br>
        @endforeach

        <button type="submit">Save</button>
    </form>
</x-layout>
