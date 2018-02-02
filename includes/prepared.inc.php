<?php

	if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$name = $_POST['name'];
	$address = $_POST['address'];
	$postcode = $_POST['postcode'];
	$mobile = $_POST['mobile'];
	$delivery = $_POST['delivery'];
	$card_no = $_POST['card_no'];
	$card_name = $_POST['card_name'];
	$expiry = $_POST['expiry'];
	$ccv = $_POST['ccv'];

	//error handlers
	//check for empty fields
	if  (!preg_match("/^[a-zA-Z ]*$/", $name))
		{
			header("Location: ../shippingname.php");
		 	exit();
		} 
		
		else if (!preg_match ("/^([a-zA-Z 0-9 # - ])+$/", $address))
			{
				header("Location: ../shippingaddress.php");
				exit();
			}
			
			else if (!preg_match ("/^([0-9]){6}$/", $postcode))
				{
					header("Location: ../shippingpostcode.php");
					exit();
				}
	
				else if (!preg_match ("/^([0-9]){8}$/", $mobile))
					{
						header("Location: ../shippingmobile.php");
						exit();
					}
					
					else if (!preg_match ("/^(Standard|Express)$/", $delivery))
						{
							header("Location: ../shippingdelivery.php");
							exit();
						}
						
						else if (!preg_match ("/^([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}$/", $card_no))
							{
								header("Location: ../shippingcardno.php");
								exit();
  							}
							
							else if (!preg_match ("/^[a-zA-Z ]*$/", $card_name))
								{
									header("Location: ../shippingcardname.php");
									exit();
								}
								
								else if (!preg_match ("/^([0-9]){2}([-])([0-9]){4}$/", $expiry))
									{
										header("Location: ../shippingexpiry.php");
										exit();
									}
									
									else if (!preg_match ("/^([0-9]){3}$/", $ccv))
										{
											header("Location: ../shippingccv.php");
											exit();
										}
										
										else {
											//only when everything is checked and validated,
											//then will insert user into database
											$sql = "INSERT INTO shipping (name, address, postcode, mobile, delivery, card_no, card_name, expiry, ccv) 
													VALUES ('$name', '$address', '$postcode', '$mobile', '$delivery', '$card_no', '$card_name', '$expiry', '$ccv');";
											$sql = "TRUNCATE TABLE cart4";
											mysqli_query($conn, $sql);
											header("Location: ../summary.php");
											exit();
										}
										
	}

	
else {
 	header("Location: ../shipping.php");
	exit();
}

?>



