@extends('layouts.master')

@section('content')
<form method="POST" action="/parkeerplaats/store">
    {!! csrf_field() !!}

   <div>
        prkplstraat
        <input type="text" name="prkplstraat" value="{{ old('prkplstraat') }}">
    </div>
    <div>
        prkplstraatnummer
        <input type="text" name="prkplstraatnummer" value="{{ old('prkplstraatnummer') }}">
    </div>
    <div>
        prkplgemeente
        <input type="text" name="prkplgemeente" value="{{ old('prkplgemeente') }}">
    </div>
    <div>
        Prijs
        <input type="text" name="Prijs" value="{{ old('Prijs') }}">
    </div>
    <div>
        BeschikbaarStarttijd
        <input type="datetime-local" name="BeschikbaarStarttijd" value="{{ old('BeschikbaarStarttijd') }}">
    </div>
    <div>
        BeschikbaarStoptijd
        <input type="datetime-local" name="BeschikbaarStoptijd" value="{{ old('BeschikbaarStoptijd') }}">
    </div>
    <div>
        <button type="submit">Voeg toe</button>
    </div>
</form>
@endsection