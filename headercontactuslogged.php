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

					<a href="#">About Us</a>
					<a hreh="#">Settings</a>

			</div>
		</div>
	</nav>
</header>