<!-- @extends('layouts.app') -->

@section('content')
    <h1>Create Privilege</h1>

    <form action="{{ route('privileges.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Create Privilege</button>
    </form>
@endsection
