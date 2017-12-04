<?php
	include_once 'includes/settings.inc.php';
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
			<h2>Settings</h2>
			
					<button type="Forgot Password" class="button" name="Forgot Password" value="Forgot Password">Forgot Password</button>

					<button type="Change Password" class="button" name="Change Password" value="Change Password">Change Password</button>

					<button type="Change Email" class="button" name="Change Email" value="Change Email">Change Email</button>

					<button type="Delete Account" class="button" name="Delete Account" value="Delete Account">Delete Account</button>
				
		</div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>

