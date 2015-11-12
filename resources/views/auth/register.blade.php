@extends('layouts.master')
@section('content')
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        <input type="text" name="voornaam" placeholder="Voornaam" value="{{ old('voornaam') }}">
    </div>
    <div>
        <input type="text" name="achternaam" placeholder="Achternaam" value="{{ old('achternaam') }}">
    </div>
    <div>
        <input type="text" name="straatnaam" placeholder="Straat" value="{{ old('straatnaam') }}">
    </div>
    <div>
        <input type="text" name="huisnummer" placeholder="Huisnummer" value="{{ old('huisnummer') }}">
    </div>
    <div>
        <input type="text" name="woonplaats" placeholder="Woonplaats" value="{{ old('woonplaats') }}">
    </div>
    <div>
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
    </div>

    <div>
        <input type="password" placeholder="Wachtwoord" name="password">
    </div>

    <div>
        <input type="password" placeholder="Wachtwoord herhalen" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
@endsection