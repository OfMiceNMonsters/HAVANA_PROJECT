<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<div id="example1">
			<!--start actual codes-->
			<!--top label-->
			<link rel="stylesheet" type="text/css" href="style.css">
			<table class="checkout">
				<tr>
				<th>SHIPPING INFORMATION</th>
				</tr>
			</table>

				<form class="checkout-form" action="retrieve.php" method="POST">
					<label>Name:</label>
					<input type="text" name="name" placeholder="Nur Syarifah Shah" required>

					<br/>
					<br/>

					<label>Address:</label>
					<input type="text" name="address" placeholder="Blk 103A Edgefield Plains #12-192" required>
					
					<br/>
					<br/>

					<label>Postcode:</label>
					<input type="text" name="postcode" placeholder="823103" required>

					<br/>
					<br/>

					<label>Mobile Number:</label>
					<input type="text" name="mobile" placeholder="93781209" required>

					<br/><br/><br/>

					<table class="checkout">
						<tr>
						<th>DELIVERY OPTION</th>
						</tr>
					</table>

					<p> Standard Shipping [4-8 Days | FOC] </p>
					<p> Express Shipping [1-3 Days | $3.20] </p>

					<br/>
					<br/>

					<label>Shipping:</label>
					<input type="text" name="delivery" placeholder="Enter Standard or Express" required pattern="Standard" >

					<br/><br/><br/><br/>

					<table class="checkout">
						<tr>
						<th>PAYMENT DETAILS</th>
						</tr>
					</table>

					<label>Card Number:</label>
					<input type="text" name="card_no" placeholder="1234-5678-9012-1314" required>

					<br/>
					<br/>

					<label>Name on Card:</label>
					<input type="text" name="card_name" placeholder="Nur Syarifah" required>

					<br/>
					<br/>

					<label>Expiry Date:</label>
					<input type="text" name="expiry" placeholder="12-2022" required>
					<!--<label></label>
					<input type="text" name="year" placeholder="Enter Year (yy)" required>-->

					<br/>
					<br/>

					<label>CCV/CVV:</label>
					<input type="text" name="ccv" placeholder="123" required>

					<br/><br/><br/><br/><br/><br/><br/><br/><br/>

					<button type="submit" name="submit">CONTINUE</button>
			</form>

		</div>
	</div> 
</section>


<?php
	include_once 'footer.php';
?>
