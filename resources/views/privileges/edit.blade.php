<!-- @extends('layouts.app') -->

@section('content')
    <h1>Edit Privilege</h1>

    <form action="{{ route('privileges.update', $privilege) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $privilege->name }}" required>

        <button type="submit">Update Privilege</button>
    </form>
@endsection
