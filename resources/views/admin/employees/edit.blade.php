<x-layout>
    <h1>Edit Employee</h1>

    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name', $employee->name) }}" required>
        @error('name')
            <div>{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}">
        @error('phone')
            <div>{{ $message }}</div>
        @enderror

        <label for="position">Position:</label>
        <input type="text" name="position" value="{{ old('position', $employee->position) }}">
        @error('position')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Update Employee</button>
    </form>
</x-layout>
