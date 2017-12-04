<!--SYARIFAH-->

<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<div id="example1">
			<!--just to show that you're at main page-->
			<h2>Ready to checkout?</h2>
			<form class="checkout-form" action="includes/checkout.inc.php" method="POST">
					<!--make an input box for user to type-->
					<!--name must be the same as checkout.inc.php for it to be defined-->
					<input type="text" name="first" placeholder="Enter First Name" required>
					<input type="text" name="last" placeholder="Enter Last Name" required>
					<input type="text" name="street" placeholder="Enter Blk, Street Name" required>
					<input type="text" name="unit" placeholder="Enter Unit No" required>
					<input type="text" name="postal" placeholder="Enter Postal Code" required>
					<input type="text" name="shipping" placeholder="Enter Standard or Express" required>
					<input type="text" name="payment" placeholder="Enter Cash on Delivery or Debit / Credit" required>
					<br>
					<br>
					<!--button to submit the details and move to checkout.inc.php-->
					<button type="submit" name="submit">Confirm</button>
			</form>
		</div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>