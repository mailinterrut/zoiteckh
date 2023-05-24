<!-- @extends('layouts.app') -->

@section('content')
    <h1>Edit Role</h1>

    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $role->name }}" required>

        <button type="submit">Update Role</button>
    </form>
@endsection
