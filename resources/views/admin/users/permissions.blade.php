<x-layout>
    <h1>Edit User Permissions: {{ $user->name }}</h1>

    <form action="{{ route('admin.users.permissions.update', $user) }}" method="POST">
        @csrf
        @foreach($roles as $role)
            <label>
                <input type="checkbox" name="roles[]" value="{{ $role->name }}" 
                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                {{ $role->name }}
            </label><br>
        @endforeach

        <h2>Direct Permissions</h2>
        @foreach($permissions as $permission)
            <label>
                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                    {{ $user->hasPermissionTo($permission) ? 'checked' : '' }}>
                {{ $permission->name }}
            </label><br>
        @endforeach

        <button type="submit">Save</button>
    </form>
</x-layout>
