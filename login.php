<?php
	session_start();
	if(isset($_SESSION['email']) && isset($_SESSION['password']))
	{
		header('Location: home.php');
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="./css/style6.css">
</head>
<body style="background-image:url('img/bg.jpg'); background-size:cover;">
	
	<div class="loginbox">
	<h1>Secret Diary</h1>
	<p>Store your thoughts permanently and securely.</p>
	<p>Login using your username and password.</p>
		<form method="post" action="login2.php">
			
			<input type="text" placeholder="Your email" name="email" class="input" required autocomplete="off">
			<input type="password" placeholder="Password" name="password" class="input" required autocomplete="off">
			<input style="margin-left:300px;" type="checkbox" ><span class="span">Stay logged in</span>
			<input type="submit" value="Log In!" name="submit" class="btn"><br>
			<a href="index.php">Sign up</a>
		</form>
	</div>
</body>
</html>