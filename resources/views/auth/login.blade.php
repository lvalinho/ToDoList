@extends('layouts.app')

@section('title', 'tasks')

@section('content')
<form class="ui form" method="POST" action="/auth/login">
    
    {!! csrf_field() !!}
    <div class="field">
        <label>E-mail</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="field">
        <label>Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <button class="ui button" type="submit">Submit</button>
    </div>

</form>




@endsection
