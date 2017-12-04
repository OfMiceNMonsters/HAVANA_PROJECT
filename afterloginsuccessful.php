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
				<li><b><a href="index.php">HAVANA</a></b></li>
			</ul>
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>';
					} else {
						echo '<form action="includes/login.inc.php" method="POST">
							<h4><center><strong>Welcome</strong></center></h4>
						</form>';
					}
				?>

					<a href="#">About Us</a>
					<a href="#">Contact Us</a>
					<a hreh="#">Settings</a>

			</div>
		</div>
	</nav>
</header>