@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>Profile</h1>
                    <p>Name     : {{ $user->name }}</p>
                    <p>Email    : {{ $user->email }}</p>
                        <p>Photo     : {{ $user->DetailUser->photo }}</p>
                        <p>Phone    : {{ $user->DetailUser->phone }}</p>
                        <p>Address  : {{ $user->DetailUser->address }}</p>
                        <p>Gender   : {{ $user->DetailUser->gender }}</p>

                    <a

                        class="btn btn-primary"
                        href="{{ route('profile.edit', $user->id) }}"
                        role="button"
                        >Edit Profile</a
                    >

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
