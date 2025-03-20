<x-layout>
    <h1>Add New Employee</h1>

    <form action="{{ route('admin.employees.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div>{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
        @error('phone')
            <div>{{ $message }}</div>
        @enderror

        <label for="position">Position:</label>
        <input type="text" name="position" value="{{ old('position') }}">
        @error('position')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Create Employee</button>
    </form>
</x-layout>
