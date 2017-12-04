<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<!--add a class to form to add the style for sign up-->
		<!--action tells form which file to load once clicked on submit button-->
		<!--then create method in which u want to pass on data to the file-->
		<!--GET method is see all the info passed in the url-->
		<!--use POST method cause dont want to show password // dont want to pass info in a visible way-->
		<div id="example1">
			<!--just to show that you're at main page-->
			<h2>Register</h2>
			<form class="signup-form" action="includes/signup.inc.php" method="POST">
				<input type="text" name="first" placeholder="First Name" required>
				<input type="text" name="last" placeholder="Last Name" required>
				<input type="email" name="email" placeholder="E-mail" required>
				<input type="text" name="uid" placeholder="Username" required>
				<input type="password" name="pwd" placeholder="Password" required>
				<br>
				<br>
				<button type="submit" name="submit">Sign Up</button>
			</form>
		</div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>