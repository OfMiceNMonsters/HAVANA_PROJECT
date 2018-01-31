<?php

	if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
	$delivery = mysqli_real_escape_string($conn, $_POST['delivery']);
	$card_no = mysqli_real_escape_string($conn, $_POST['card_no']);
	$card_name = mysqli_real_escape_string($conn, $_POST['card_name']);
	$expiry = mysqli_real_escape_string($conn, $_POST['expiry']);
	$ccv = mysqli_real_escape_string($conn, $_POST['ccv']);

	//error handlers
	//check for empty fields
	if  (!preg_match("/^[a-zA-Z]*$/", $name) || 
		(!preg_match("/^([a-zA-Z 0-9 # -])+$/", $address) || 
		(!preg_match("/^([0-9]){6}$/", $postcode) || 
		(!preg_match("/^([0-9]){8}$/", $mobile) ||
		(!preg_match("/^([a-zA-Z]){8}$/", $delivery) || 
		(!preg_match("/^([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}$/", $card_no) || 
		(!preg_match("/^([a-zA-Z])$/", $card_name) || 
		(!preg_match("/^([0-9]){2}([-])([0-9]){4}$/", $expiry) || 
		(!preg_match("/^([0-9]){3}$/", $ccv)) 

		{
			header("Location: ../shipping.php?checkout=invalid");
		 	exit();
		} 

		else {
			//only when everything is checked and validated,
			//then will insert user into database
			$sql = "INSERT INTO shipping (name, address, postcode, mobile, delivery, card_no, card_name, expiry, ccv) VALUES ('$name', '$address', '$postcode', '$mobile', '$delivery', '$card_no', '$card_name', '$expiry', '$ccv');";
			
			mysqli_query($conn, $sql);
			header("Location: ../summary.php");
		 	exit();

		}
	}

else {
 	header("Location: ../summary.php");
	exit();
}

?>



