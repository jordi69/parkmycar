<html>
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
</head>
<body>
	<div class="container">
		<div class="content">
			<a href="/auth/login">Login</a>
    		<a href="/auth/register">Register</a>
    		<a href="/">Home</a>
    		<a href="/auth/logout">Logout</a>
			@yield('content')
		</div>
	</div>
</body>
</html>