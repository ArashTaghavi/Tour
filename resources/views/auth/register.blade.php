@extends('layouts.auth')

@section('content')
    <div class="container">
        <form method="POST" class="appointment-form" id="appointment-form" action="{{route('doRegister')}}">
            <h2>Login</h2>
            @csrf
            <div class="form-group-1">
                <input type="text" name="email" id="email" placeholder="Email ..." autocomplete="off"/>
            </div>
            <div class="form-group-1">
                <input type="password" name="password" id="password" placeholder="Password ..." autocomplete="off"/>
            </div>
            <div class="form-group-1">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password ..."
                       autocomplete="off"/>
            </div>
            <div class="form-submit">
                <button type="submit" name="submit" id="submit" class="submit">Register</button>
            </div>
        </form>
    </div>
@endsection
