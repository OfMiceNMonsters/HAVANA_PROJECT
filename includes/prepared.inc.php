<?php

	// to be called when _POST for xss prevention
	function strip_tag($string) 
	{ 
		// strip html & php tags
		$string = strip_tags($string);
		// strip control characters
		return preg_replace('/[[:punct:]]/', ' ', $string);
	}
	
	// when submit button is posted
	if (isset($_POST['submit'])) {

	// initialize the localhost -> root -> havana
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "havana";

	// link to database
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	
	// encrypt card_no
	// $inputtext = $_POST['card_no'];
	// $key = 'SecretKeySecretK';
	
	// verify the initialization vector
	// $iv_size = mcrypt_get_iv_size (MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	
	// create the initialization vector with random numbers 
	// $iv = 12345;
	// $encryptedtext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $inputtext, MCRYPT_MODE_ECB, $iv);
	
	//function encrypt($decrypted, $card_no, $salt='!kQm*fF3pXe1Kbm%9') { 
	// Build a 256-bit $key which is a SHA256 hash of $salt and $card_no.
	//$key = hash('SHA256', $salt . $card_no, true);
	// Build $iv and $iv_base64.  We use a block size of 128 bits (AES compliant) and CBC mode.  (Note: ECB mode is inadequate as IV is not used.)
	//srand(); $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
	//if (strlen($iv_base64 = rtrim(base64_encode($iv), '=')) != 22) return false;
	// Encrypt $decrypted and an MD5 of $decrypted using $key.  MD5 is fine to use here because it's just to verify successful decryption.
	//$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $decrypted . md5($decrypted), MCRYPT_MODE_CBC, $iv));
	// We're done!
	//return $iv_base64 . $encrypted;
	
		
		
		
	//post the inputs and add the strip tags for xss prevention
	$name =  strip_tag($_POST['name']);
	$address = strip_tag($_POST['address']);
	$postcode = strip_tag($_POST['postcode']);
	$mobile = strip_tag($_POST['mobile']);
	$delivery = strip_tag($_POST['delivery']);
	$card_no = strip_tag($_POST['card_no']);
	$card_name = strip_tag($_POST['card_name']);
	$expiry = strip_tag($_POST['expiry']);
	$ccv = strip_tag($_POST['ccv']);

	// error handlers
	// name input can only have letters
	if  (!preg_match("/^[a-zA-Z ]*$/", $name))
		{
			// if never follow regex, go to shippingname.php error page
			header("Location: ../shippingname.php");
		 	exit();
		} 
		
		// address input can only have letters, numbers and # | -
		else if (!preg_match ("/^([a-zA-Z 0-9 # - ])+$/", $address))
			{
				// if never follow regex, go to shippingaddress.php error page
				header("Location: ../shippingaddress.php");
				exit();
			}
			
			// postcode input can only have numbers and must be 6 digits
			else if (!preg_match ("/^([0-9]){6}$/", $postcode))
				{
					// if never follow regex, go to shippingpostcode.php error page
					header("Location: ../shippingpostcode.php");
					exit();
				}
	
				// mobile input can only have numbers and must be 8 digits
				else if (!preg_match ("/^([0-9]){8}$/", $mobile))
					{
						// if never follow regex, go to shippingmobile.php error page
						header("Location: ../shippingmobile.php");
						exit();
					}
					
					// delivery input can only be Standard or Express 
					else if (!preg_match ("/^(Standard|Express)$/", $delivery))
						{
							// if never follow regex, go to shippingdelivery.php error page
							header("Location: ../shippingdelivery.php");
							exit();
						}
						
						// card_no input can only have numbers and must be 16 digits
						else if (!preg_match ("/^([0-9]){16}$/", $card_no))
							//else if (!preg_match ("/^([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}([-])([0-9]){4}$/", $card_no))
							{
								// if never follow regex, go to shippingcardno.php error page
								header("Location: ../shippingcardno.php");
								exit();
  							}
							
							// card_name input can only have letters
							else if (!preg_match ("/^[a-zA-Z ]*$/", $card_name))
								{
									// if never follow regex, go to shippingcardname.php error page
									header("Location: ../shippingcardname.php");
									exit();
								}
								
								// expiry input can only have numbers in the format mm-yyyy
								else if (!preg_match ("/^([0-9]){6}$/", $expiry))
									//else if (!preg_match ("/^([0-9]){2}([-])([0-9]){4}$/", $expiry))
									{
										// if never follow regex, go to shippingexpiry.php error page
										header("Location: ../shippingexpiry.php");
										exit();
									}
									
									// ccv input can only have numbers and must be 3 digits
									else if (!preg_match ("/^([0-9]){3}$/", $ccv))
										{
											// if never follow regex, go to shippingccv.php error page
											header("Location: ../shippingccv.php");
											exit();
										}
										
										else 
										{
											// only when everything is checked and validated,
											// then will insert user into database
											$sql = "INSERT INTO shipping (name, address, postcode, mobile, delivery, card_no, card_name, expiry, ccv) 
													VALUES ('$name', '$address', '$postcode', '$mobile', '$delivery', '$card_no', '$card_name', '$expiry', '$ccv');";
											
											//$query = $conn->prepare("insert into shipping (name, address, postcode, mobile, delivery, card_no, card_name, expiry, ccv) 
													//VALUES ('$name', '$address', '$postcode', '$mobile', '$delivery', '$card_no', '$card_name', '$expiry', '$ccv');");
												//$query->bind_param("ssiisisii", $name, $address, $postcode, $mobile, $delivery, $card_no, $card_name, $expiry, $ccv);
												//$query->execute();
											
											// once input inserted into database, drop rows inside the cart 
											// ASK WHY TRUNCATE CANNOT WORK!!!!!
											//$sql = "TRUNCATE TABLE cart4";
											mysqli_query($conn, $sql);
											
											// instantiate our PDO object and create a new MySQL connection.
											$pdo = new PDO('mysql:host=localhost;dbname=havana', 'root', '');
											 
											// SQL statement to delete all rows in cart4
											$sql = "TRUNCATE TABLE `cart4`";
											 
											// prepare the SQL query.
											$statement = $pdo->prepare($sql);
											 
											// execute the statement.
											$statement->execute();
											
											// if everything is ok, link to summary page
											header("Location: ../summary.php");
											// go out of the loop
											exit();
										}
										
											
	}
			
	
else {
	// if nothing is clicked etc, stay on the shipping.php page 
	header("Location: ../shipping.php");
	exit();
}

?>



