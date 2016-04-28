@extends('layouts.app')

@section('title', 'tasks')

@section('content')

<form method="POST" action="/auth/register" class="ui form">
   
    {!! csrf_field() !!}
    <div class="field">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="field">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div class="field">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button class="ui button" type="submit">Register</button>
    </div>
</form>


@endsection
