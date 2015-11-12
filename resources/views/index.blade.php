<html>
<head>
	<meta charset="UTF-8">
	<title>Park My Car</title>
	<link rel="stylesheet" href="/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Righteous|Montserrat:700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="/js/geocomplete.js"></script>
</head>
<script>
$(document).ready(function(){

  $('#datepicker').datepicker({ dateFormat: 'dd MM yy' });
  $('#datepickertwee').datepicker({ dateFormat: 'dd MM yy' });
    //get language
  var langage = (navigator.language || navigator.browserLanguage).split('-')[0];

  //change locale datepicker
  $.datepicker.setDefaults($.datepicker.regional[langage]);


$('.dlgAanmelden').click(function(e){
    $(".registerForm").fadeIn(100);
    $(".loginForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);
    $('.overlay').fadeIn(100);
    $('.registerForm').css('z-index','99999');
});
$('.dlgLogin').click(function(e){
    $(".loginForm").fadeIn(100);
    $(".registerForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);
    $('.overlay').fadeIn(100);
    $('.loginForm').css('z-index','99999');
});
$('.dlgToevoegen').click(function(e){
    $(".toevoegenForm").fadeIn(100);
    $(".registerForm").fadeOut(100);
    $(".loginForm").fadeOut(100);
    //$('.overlay').fadeIn(100);
    //$('.toevoegenForm').css('z-index','99999');
});
$('.cross').click(function(e){
    $(".registerForm").fadeOut(100);
    $(".loginForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);
    $('.overlay').fadeOut(100);
});
$('.overlay').click(function(e){
    $(".registerForm").fadeOut(100);
    $(".loginForm").fadeOut(100);
    $(".toevoegenForm").fadeOut(100);
    $('.overlay').fadeOut(100);
});

$(function(){
        
        var options = {
          map: ".map_canvas"
        };
        
        $("#geocomplete").geocomplete(options)
          .bind("geocode:result", function(event, result){
            $("#latitude").val(result.geometry.location.lat());
            $("#longitude").val(result.geometry.location.lng());
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });

          $("#geocompletetwee").geocomplete(options)
          .bind("geocode:result", function(event, result){
            $("#latitude").val(result.geometry.location.lat());
            $("#longitude").val(result.geometry.location.lng());
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
           $("#geocompletetwee").trigger("geocode");
        });
        
        $("#examples a").click(function(){
          $("#geocomplete").val($(this).text()).trigger("geocode");
          return false;
        });
        
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
<div class="searchbar">
<div class="searchitems">
<form method="POST" action="Parkeerplaatsen/search">
    {!! csrf_field() !!}
    @if (count($errors))
    <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
    </ul>
    @endif
    <div>
        <input type="text" name="plaats" id="geocompletetwee" class="searchPlaats" placeholder="Waar wil je parkeren?" value="{{ old('voornaam') }}">
        <input type="text" name="tijd" id="datepicker" placeholder="Wanneer?"  class="searchTijd" value="{{ old('achternaam') }}">
        <input type="submit" value="ZOEKEN" id="searchButton">
        <input id="latitude" type="text" name="latitude" hidden="true">
        <input id="longitude" type="text" name="longitude" hidden="true">
    </div>
</form>
<div class="map_canvas"></div>
</div>
</div>
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
<div class="overlay">
</div>
<div class="registerForm">
<div class="cross">
 X
</div>
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
        <input id="geocomplete" type="text" name="prkplstraat" value="{{ old('prkplstraat') }}" placeholder="Plaats">
    </div>
    <div>
        <input id="latitude" type="text" name="latitude" hidden="true">
    </div>
    <div>
        <input id="longitude" type="text" name="longitude" hidden="true">
    </div>
    <div>
        <input type="text" name="Prijs" value="{{ old('Prijs') }}" placeholder="Prijs / uur">
    </div>
    <div>
        <input type="datetime" id="datepickertwee" name="BeschikbaarStartdatum" value="{{ old('BeschikbaarStarttijd') }}" placeholder="Start Datum">
    </div>

     <div>
        <input type="text" onclick="this.type='time';" name="BeschikbaarStarttijd" value="{{ old('BeschikbaarStarttijd') }}" placeholder="Start Tijd">
    </div>
    <div>
        <input type="text" onclick="this.type='time';"  name="BeschikbaarStoptijd" value="{{ old('BeschikbaarStoptijd') }}" placeholder="Stop Tijd">
    </div>
    <div>
        <input type="submit" value="Toevoegen">
    </div>
</form>

<div class="map_canvas"></div>
</div>
</html>