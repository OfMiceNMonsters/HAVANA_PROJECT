<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>HAVANA</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><b><a href="main_afterlogin.php">HAVANA</a></b></li>
			</ul>
			<div class="nav-login">
				<?php
					
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>';
					
				?>

				<a href="contactuslogged.php">Contact Us</a>
				<a href="cart.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cart</a>
				<a href="settingslogged.php">Settings </a> 
				<a href="faqlogged.php">FAQ</a>

			</div>
		</div>
	</nav>
</header>