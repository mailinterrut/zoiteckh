<!-- @extends('layouts.app') -->

@section('content')
    <h1>Account Details</h1>

    <div>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Add any other account details you want to display -->
    </div>

    <a href="{{ route('account.settings') }}" class="btn btn-primary">Edit Account Settings</a>
@endsection
