@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" required autofocus>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div>
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>

                <button type="submit">Register</button>
            </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
