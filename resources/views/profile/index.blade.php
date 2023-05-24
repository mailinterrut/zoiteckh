@extends('layouts.app')

@section('content')
    <div class="box transaction-box">
        <div class="header-container">
            <h3 class="section-header">Name: {{ Auth::user()->name }}</h3>
            <p>Email: {{ Auth::user()->email }}</p>                       
        </div>
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
    
@endsection
