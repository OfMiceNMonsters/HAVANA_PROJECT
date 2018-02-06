<?php

$conn=mysqli_connect('localhost','root','','havana');

if (isset($_POST['submit'])) {
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	$repassword = $_POST['repwd'];

	//Error handlers
	//Check for empty fields
		//Check if input characters are valid
		$sql = "SELECT user_id FROM usersandemail WHERE user_email='$email'";
		mysqli_query($conn, $sql);
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0)
					{
						echo "Email used, try again";
					}
						else
					{
						//echo "Email not used,carry on";
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
						//Hashing the password
						//Insert the user into the database
						//if($responseKey = Success)
						//{
						/*
						echo "dsa"; echo "<br>";
						echo $firstname;
						echo "<br>";
						echo $lastname; echo "<br>";
						echo $email; echo "<br>";
						echo $username; echo "<br>";
						echo $password; echo "<br>";
						echo $token;
						*/
						$sql = "INSERT INTO usersandemail (user_firstname, user_lastname, username, user_email, user_password, email_verified, token) 
													VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedpassword', 0, '$TOKEN');";
						mysqli_query($conn, $sql);
						
						//require_once "C:/xampp/htdocs/combined_havana/PHPMailer/PHPMailer.php";
						//include_once "C:/xampp/htdocs/combined_havana/PHPMailer/PHPMailer.php";
						$body ="Click here to verify your email: <br><br> <a href='http://localhost/combined_havana/
						verify.php?=$email & token=$token'>Click Here</a>";
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
					//else
					//{
					//	header("Location: ../captchanotchecked.php");
					//} 
			

else 
{
	header("Location: ../signup.php");
	exit();
}