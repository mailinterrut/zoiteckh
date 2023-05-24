@extends('layouts.app')

@auth                     
@section('content')
<div class="container w-100">
    <div class="row justify-content-center w-100-pc">
        <div class="c">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@else
    @php
        return redirect()->route('login');
        exit();
    @endphp
@endauth  