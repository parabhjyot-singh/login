<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="This is an example of meta description">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body id="header">
	<header >
		<nav>
			
				<ul id="parent">
				<li style="width: 40%;height: 20%;"><a id="hi"href="index.php">
				<img src="log.jpg" alt="logo" width="10%" ></a></li>
			<!-- 	<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li> -->
				
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Portfolio</a></li>
					<li><a href="#">About me</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<div></br></br></br>
					<?php
if(isset($_SESSION['userId'])){
		echo '<form action="includes/logout.inc.php" method="post">
						
						<button type="submit" name=logout-submit >Logout</button>
					</form>';
	}
	else{
		echo '<h1 id="h1">WELCOME TO THE LOGIN PAGE</h1></br></br>
					<form id="form" action="includes/login.inc.php" method="post">
						<input id="input" type="text" name="mailuid"placeholder="User Name/Email.."></br>
						<input id="input"type="password" name="pwd"placeholder="password"></br>
						<button  type="submit" name="login-submit">Login</button>
					</form>
					<a id="signup"href="signup.php">Signup</a>
';
	}
					?>
										
				</div>
		</nav>
	</header>
</body>