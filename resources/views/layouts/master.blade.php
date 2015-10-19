<html>
<head>
	<meta charset="UTF-8">
	<title>Park My Car</title>
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Righteous|Montserrat:700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<div class="overlay">
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

    <div class="rightHeader">
    	<!-- INLOGGEN -->
    	<div class="headerInloggen">
    	<p>Inloggen</p>
       		<!--<a href="/auth/login">Inloggen</a>-->
    	</div>

    	<!-- AANMELDEN -->
    	<div class="headerAanmelden">
       		<a href="/auth/register">Aanmelden</a>
    	</div>
    </div>

    <!-- TITLE -->
    <div class="logo">
       <h1>PARK MY CAR</h1>
       <p>Vind gemakkelijk een parkeerplaats in de buurt.</p>
       <button>HOE HET WERKT</button>
    </div>
</header>
<body>
	<div class="container">
		<div class="top">
			<a href="/auth/login">Login</a>
    		<a href="/auth/register">Register</a>
    		<a href="/">Home</a>
    		<a href="/auth/logout">Logout</a>
    		<a href="/parkeerplaatsen/create">voeg parkeerplaats toe</a>
			@yield('content')
		</div>
	</div>
</body>
</div>
</html>