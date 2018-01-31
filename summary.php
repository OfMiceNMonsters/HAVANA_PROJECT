<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<!--to make it appear in the white border-->
		<div id="example1">
			<!--just to show that you're at main page-->
			<link rel="stylesheet" type="text/css" href="style.css">
			<table class="checkout">
				<tr>
				<th>THANK YOU FOR SHOPPING WITH US!</th>
				</tr>
			</table>

			<br/><br/>

			<form class="bye" method="POST">
					<label>Feedback / Suggestions:</label>
					<br/><br/>
					<textarea rows="4" cols="50" name="comment" form="usrform">Please leave a feedback for us..</textarea>

					<br/><br/><br/><br/>

					<!--so once submitted will go back to catalogue-->
					<button type="submit" name="submit"><a href= "index.php">Browse Catalogue</a></button>
			</form>
		
		</div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
