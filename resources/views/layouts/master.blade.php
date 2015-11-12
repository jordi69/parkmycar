<html>
<head>
	<meta charset="UTF-8">
	<title>Park My Car</title>
	<link rel="stylesheet" href="/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Righteous|Montserrat:700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<div class="overlay">
<script>
$(document).ready(function(){
$('.dlgAanmelden').click(function(e){
    $(".registerForm").fadeIn(100);
    $(".loginForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);

});
$('.dlgLogin').click(function(e){
    $(".loginForm").fadeIn(100);
    $(".registerForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);
});
$('.dlgToevoegen').click(function(e){
    $(".toevoegenForm").fadeIn(100);
    $(".registerForm").fadeOut(100);
    $(".loginForm").fadeOut(100);
});
$('.cross').click(function(e){
    $(".registerForm").fadeOut(100);
    $(".loginForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);
});
});
</script>
<header>
	<div class="leftHeader">
		<!-- VERHALEN -->
   		<div class="headerVerhalen">
       		<a href="/verhalen">Verhalen</a>
    	</div>

    	<!-- HELP -->
   		<div class="headerHelp">
       		<a href="/help">Help</a>
    	</div>
	</div>
@if(Auth::check())
   <div class="rightHeader">
      <!-- INLOGGEN -->
      <div class="headerToevoegen">
          <a class="dlgToevoegen">Parkeerplaats</a>
      </div>

      <!-- AANMELDEN -->
      <div class="headerAanmelden">
          <a class="dlgProfiel">Mijn Profiel</a>
      </div>
    </div>
@else
    <div class="rightHeader">
    	<!-- INLOGGEN -->
    	<div class="headerInloggen">
       		<a class="dlgLogin">Inloggen</a>
    	</div>

    	<!-- AANMELDEN -->
    	<div class="headerAanmelden">
       		<a class="dlgAanmelden">Aanmelden</a>
    	</div>
    </div>
@endif

    <!-- TITLE -->
    <div class="logo">
       <h1>PARK MY CAR</h1>
       <p>Vind gemakkelijk een parkeerplaats in de buurt.</p>
       <button>HOE HET WERKT</button>
    </div>
</header>
<body>
	<div class="container">
		<!-- <div class="top">
    		<a href="/">Home</a>
    		<a href="/auth/logout">Logout</a>
    		<a href="/parkeerplaatsen/create">voeg parkeerplaats toe</a>
		</div>

    -->
    @yield('content')
	</div>
</body>
</div>
<div class="registerForm">
<div class="cross">
 X
</div>

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}
    @if (count($errors))
    <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
    </ul>
    @endif
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
        <input type="submit" value="REGISTER">
    </div>
</form>
</div>

<div class="loginForm">
<div class="cross">
 X
</div>

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}
    @if (count($errors))
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail">
    </div>

    <div>
        <input type="password" name="password" id="password" placeholder="Wachtwoord">
    </div>

    <div>
        <input type="submit" value="LOGIN">
    </div>
</form>
</div>

<div class="toevoegenForm">
<div class="cross">
 X
</div>
<form method="POST" action="/parkeerplaats/store">
    {!! csrf_field() !!}

   <div>
        <input type="text" name="prkplstraat" value="{{ old('prkplstraat') }}" placeholder="Plaats">
    </div>
    <div>
        <input type="text" name="Prijs" value="{{ old('Prijs') }}" placeholder="Prijs / uur">
    </div>
    <div>
        <input type="datetime" name="BeschikbaarStarttijd" value="{{ old('BeschikbaarStarttijd') }}" placeholder="StartTijd">
    </div>
    <div>
        <input type="datetime" name="BeschikbaarStoptijd" value="{{ old('BeschikbaarStoptijd') }}" placeholder="Hoelang (in uren)">
    </div>
    <div>
        <input type="submit" value="Toevoegen">
    </div>
</form>
</div>
</html>