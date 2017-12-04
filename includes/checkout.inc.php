<!--SYARIFAH-->

<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$street = mysqli_real_escape_string($conn, $_POST['street']);
	$unit = mysqli_real_escape_string($conn, $_POST['unit']);
	$postal = mysqli_real_escape_string($conn, $_POST['postal']);
	$shipping = mysqli_real_escape_string($conn, $_POST['shipping']);
	$payment = mysqli_real_escape_string($conn, $_POST['payment']);

	//error handlers
	//check for empty fields
	if (empty($first) || empty($last) || empty($street) || empty($unit) || empty($postal) || empty($shipping) || empty($payment)) {
		 header("Location: ../checkout.php?checkout=empty");
		 exit();
	}  else {
		//check if inputs are valid
		//so if inputs are invalid, it will show and error on the url
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match("/^[a-zA-Z && 0-9]*$/", $street) || !preg_match("/^[0-9]*$/", $unit) || !preg_match("/^[0-9]*$/", $postal)    ) {
			header("Location: ../checkout.php?checkout=invalid");
		 	exit();
		} else {
			//only when everything is checked and validated,
			//then will insert user into database
			$sql = "INSERT INTO checkout (checkout_first, checkout_last, checkout_street, checkout_unit, checkout_postal, checkout_shipping, checkout_payment) VALUES ('$first', '$last', '$street', '$unit', '$postal', '$shipping', '$payment');";
			mysqli_query($conn, $sql);
			header("Location: ../summary.php");
		 	exit();


		}
	}

} else {
 	header("Location: ../checkout.php");
	exit();
}