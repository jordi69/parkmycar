@extends('layouts.master')
@section('content')
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        voornaam
        <input type="text" name="voornaam" value="{{ old('voornaam') }}">
    </div>
    <div>
        achternaam
        <input type="text" name="achternaam" value="{{ old('achternaam') }}">
    </div>
    <div>
        straat
        <input type="text" name="straatnaam" value="{{ old('straatnaam') }}">
    </div>
    <div>
        huisnummer
        <input type="text" name="huisnummer" value="{{ old('huisnummer') }}">
    </div>
    <div>
        woonplaats
        <input type="text" name="woonplaats" value="{{ old('woonplaats') }}">
    </div>
    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
@endsection