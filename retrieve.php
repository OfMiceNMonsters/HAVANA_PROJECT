<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<div id="example1">
			<!--start actual codes-->
			<!--top label-->
			<table class="checkout">
				<tr>
				<th>ORDER SUMMARY</th>
				</tr>
			</table>

			<!--<form class="checkout-form" action="includes/checkout.inc.php" method="GET">-->

				<p>You have 1 item in your cart.</p>

				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

				<table class="checkout">
					<tr>
					<th>SHIPPING TO</th>
					</tr>
				</table>

				<html>
				<body>
				<?php
				$name = $_POST["name"];
				$address = $_POST["address"];
				$postcode = $_POST["postcode"];
				$mobile = $_POST["mobile"];
				$delivery = $_POST["delivery"];
				$card_no = $_POST["card_no"];
				$card_name = $_POST["card_name"];
				$expiry = $_POST["expiry"];
				$ccv = $_POST["ccv"];

				if (!empty($name))
				{
					if (preg_match("/^[a-zA-Z ]+$/", $name))
				{
				?>
				<?php
					echo "Name: <b>".$_POST['name']."</b><br>";
				?>

				<?php
					}
					else
					{
				?>
				Your name input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}
				
				//error handler - address
				if (!empty($address))
				{
					if (preg_match("/^([a-zA-Z 0-9 # -])+$/", $address))
				{
				?>
				<?php echo "Address: <b>".$_POST['address']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your address input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				//error handler - postcode
				if (!empty($postcode))
				{
					if (preg_match("/^([0-9]){6}$/", $postcode))
				{
				?>
				<?php echo "Postcode: <b>".$_POST['postcode']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your postcode input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				//error handler - mobile
				if (!empty($mobile))
				{
					if (preg_match("/^([0-9]){8}$/", $mobile))
				{
				?>
				<?php echo "Mobile: <b>".$_POST['mobile']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your mobile input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				//error handler - delivery
				if (!empty($delivery))
				{
					if (preg_match("/^([a-zA-Z]){8}$/", $delivery))
				{
				?>
				<?php echo "Delivery: <b>".$_POST['delivery']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your mobile input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				//error handler - card input
				if (!empty($card_no) || !empty($card_name))
				{
					if (preg_match("/^([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}$/", $card_no) || preg_match("/^([a-zA-Z])$/", $card_name))
				{
				?>
				<?php echo "Card Number: <b>".$_POST['card_no']."</b><br>";
					  echo "Card Name: <b>".$_POST['card_name']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your card input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				//error handler - expiry
				if (!empty($expiry))
				{
					if (preg_match("/^([0-9]){2}([-])([0-9]){4}$/", $expiry))
				{
				?>
				<?php echo "Expiry: <b>".$_POST['expiry']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your expiry input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				//error handler - ccv
				if (!empty($ccv))
				{
					if (preg_match("/^([0-9]){3}$/", $ccv))
				{
				?>
				<?php echo "CCV: <b>".$_POST['ccv']."</b><br>";?>

				<?php
					}
					else
					{
				?>
				Your ccv input is wrong. <br>
			</body>
			</html>

			<?php
				}
			}

				?>

				<br/><br/><br/><br/><br/><br/><br/><br/>
				<!--<div class="payment-button" onclick="window.location.href='order.php'">CONFIRM</div>-->

				<form class="checkout-form" action="summary.php" method="POST">
					<button type="submit" name="submit">CONFIRM</button>
				</form>

			<!--</form>-->

		</div>
	</div> 
</section>


<?php
	include_once 'footer.php';
?>
