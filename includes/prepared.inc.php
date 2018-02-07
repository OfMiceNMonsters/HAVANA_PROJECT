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
	
	//post the inputs and add the htmlspecialchars & strip tags for xss prevention
	$name = htmlspecialchars(strip_tags($_POST['name']));
	$address = htmlspecialchars(strip_tags($_POST['address']));
	$postcode = htmlspecialchars(strip_tags($_POST['postcode']));
	$mobile = htmlspecialchars(strip_tags($_POST['mobile']));
	$delivery = htmlspecialchars(strip_tags($_POST['delivery']));
	$card_no = htmlspecialchars(strip_tags($_POST['card_no']));
	$card_name = htmlspecialchars(strip_tags($_POST['card_name']));
	$expiry = htmlspecialchars(strip_tags($_POST['expiry']));
	$ccv = htmlspecialchars(strip_tags($_POST['ccv']));

	// regular expression
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
											// prepare statement
											$query = "INSERT INTO shipping (name, address, postcode, mobile, delivery, card_no, card_name, expiry, ccv) VALUES (?,?,?,?,?,?,?,?,?)";
											$statement = $conn->prepare($query);
											// binding parameters
											$statement->bind_param("ssiisisii", $name, $address, $postcode, $mobile, $delivery, $card_no, $card_name, $expiry, $ccv);
											
											// run the query
											$statement->execute();
											
											// to check any errors
											print $statement->error;
											
											// once input inserted into database, drop rows inside the cart 
											// instantiate our PDO object and create a new MySQL connection.
											$pdo = new PDO('mysql:host=localhost;dbname=havana', 'root', '');
											 
											// SQL statement to delete all rows in cart4
											$sql = "TRUNCATE TABLE `cart`";
											 
											// prepare the SQL query.
											$query = $pdo->prepare($sql);
											 
											// execute the statement.
											$query->execute();
											
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



