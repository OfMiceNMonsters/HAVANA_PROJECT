<?php

$conn=mysqli_connect('localhost','root','','havana');

function strip_tag($string) { 

	// strip html & php tags
	$string = strip_tags($string);
	// strip control characters
	return preg_replace('/[[:punct:]]/', ' ', $string);

}

if (isset($_POST['submit'])) {
	
	$firstname = htmlspecialchars(strip_tags($_POST['firstname']));
	$lastname = htmlspecialchars(strip_tags($_POST['lastname']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$username = htmlspecialchars(strip_tags($_POST['username']));
	$password = htmlspecialchars(strip_tags($_POST['pwd']));
	$repassword = htmlspecialchars(strip_tags($_POST['repwd']));


	//Error handlers
	//Check for empty fields
		//Check if input characters are valid
		//$sql = "SELECT user_id FROM usersandemail WHERE user_email='$email'";
		//mysqli_query($conn, $sql);
		//$result = mysqli_query($conn, $sql);
		//$resultCheck = mysqli_num_rows($result);
		
		//sql statement
		$sql = "SELECT user_id FROM usersandemail WHERE user_email=?";
		
		//prepared statement , init stands for initialize.
		$statement= mysqli_stmt_init($conn);
		
		//prepare prepared statement, make use of the sql statement and do if statement
		if(!mysqli_stmt_prepare($statement,$sql)) //if function here doesnt succeed then proceed to if loop
		{
			echo "SQL statement failed";
		}
		else
		{
			//bind parameters to ? //can use s:string i:integet b:blob d:double
			//3rd param is to search for that thing in database
			mysqli_stmt_bind_param($statement, "s", $email);
			
			//run parameters inside database
			mysqli_stmt_execute($statement);
			//get the data
			$result=mysqli_stmt_get_result($statement);
			
			$row= mysqli_fetch_assoc($result);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0)
			{
				printf ("Email used. Try again.");
			}
			else
			{
				
				$query = "SELECT user_id FROM usersandemail WHERE username=?";
		
		//prepared statement , init stands for initialize.
		$stmt= mysqli_stmt_init($conn);
		
		//prepare prepared statement, make use of the sql statement and do if statement
		if(!mysqli_stmt_prepare($stmt,$query)) //if function here doesnt succeed then proceed to if loop
		{
			echo "SQL statement failed";
		}
		else
		{
			//bind parameters to ? //can use s:string i:integet b:blob d:double
			//3rd param is to search for that thing in database
			mysqli_stmt_bind_param($stmt, "s", $username);
			
			//run parameters inside database
			mysqli_stmt_execute($stmt);
			//get the data
			$results=mysqli_stmt_get_result($stmt);
			
			$rows= mysqli_fetch_assoc($results);
			$rowcounts=mysqli_num_rows($results);
			
			if($rowcounts >0)
			{
				printf ("Username taken. Please try again.");
			}
			else
			{
				$token='qazzwsxedcrfvtgbyhnujmikolp';
						$TOKEN=str_shuffle($token);
						
						//echo $TOKEN;
						
						/*$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$randstring = '';
						for ($i = 0; $i < 10; $i++) {
						$randstring = $characters[rand(0, strlen($characters))];
						}
						echo $randstring;
						*/
						
						$secretKey="6Le6ukAUAAAAANWzrVAdzQrKBRGpZHntHeXK_qXf";
						$responseKey=$_POST['g-recaptcha-response'];
						$url="https://www.google.com/recaptcha/api/siteverify?=$secretKey&response=$responseKey";
						$response=file_get_contents($url);
						$response=json_decode($response);
						$hashedpassword=password_hash($password, PASSWORD_BCRYPT);
						//if($responseKey = Success)
						$sql = "INSERT INTO usersandemail (user_firstname, user_lastname, username, user_email, user_password, email_verified, token) 
													VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedpassword', 0, '$TOKEN');";
						mysqli_query($conn, $sql);
						
						//require_once "C:/xampp/htdocs/combined_havana/PHPMailer/PHPMailer.php";
						//include_once "C:/xampp/htdocs/combined_havana/PHPMailer/PHPMailer.php";
						$body ="Hi,$firstname $lastname. Thank you for signing up with HAVANA. Click here to verify your email: http://localhost/HAVANA_PROJECT-master.
						                  With love, 
						                  Team HAVANA";
						$headers = 'From: havana@gmail.com' . "\r\n" 
            .'Reply-To: havana@gmail.com';	
			mail("$email","Subject",$body,$headers);
						//perform this query if the email is not used
						//$mail= new PHPMailer;
						//require "C:/xampp/htdocs/combined_havana/PHPMailer-master/Exception.php";
						/*require 'PHPMailer-master/autoload.php';
						require 'PHPMailer-master/PHPMailer.php';
						$mail = new PHPMailer\PHPMailer\PHPMailer();
						$mail->setFrom('havana@gmail.com');
						$mail->addAddress($email,$username);
						$mail->Subject="Email Verification";
						$mail->isHTML(true);
						$mail->Body="Click here to verify your email: <br><br> <a href='http://localhost/combined_havana/
						verify.php?=$email & token=$token'>Click Here</a>";*/
						header("Location: ../signupsuccessful.php");
						//echo "Done.";
						exit();
						}
		}
		}
					//if($resultCheck > 0)
					//{
					//	echo "Email used, try again";
					//}
						//else
					//{
						//echo "Email not used,carry on";
					//else
					//{
					//	header("Location: ../captchanotchecked.php");
					//} 
			
					}
		}
else 
{
	header("Location: ../signup.php");
	exit();
}