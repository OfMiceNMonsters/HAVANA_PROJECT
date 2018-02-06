<?php

if (isset($_POST['submit'])) 
{
	
	include_once 'dbh.inc.php';

	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) 
	{
		header("Location: ../signup.php?signup=empty");
		exit();
	} 
	else 
	{
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]{2,}$/", $first) || !preg_match("/^[a-zA-Z]{2,}$/", $last))
		{
			header("Location: ../signup.php?signup=invalid");
			exit();
		} 
		else 
		{
			//Check if email is valid
			$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

			if($resultCheck > 0)
			{
				echo "Email exists.Try again.";
			}
			else
			{
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0)
				{
					header("Location: ../usernametaken.php");
				} 
				else 
				{

					if(isset($_POST['submit']))
					{
						$secretKey="6Le6ukAUAAAAANWzrVAdzQrKBRGpZHntHeXK_qXf";
						$responseKey=$_POST['g-recaptcha-response'];
						$url="https://www.google.com/recaptcha/api/siteverify?=$secretKey&response=$responseKey";
						$response=file_get_contents($url);
						$response=json_decode($response);
						//Hashing the password
						$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);
						//Insert the user into the database
						$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
						mysqli_query($conn, $sql);
						header("Location: ../signupsuccessful.php");
						exit();
					}
					else
					{
						header("Location: ../captchanotchecked.php");
					} 
				}
				}
			}

		}	
	}
else 
{
	header("Location: ../signup.php");
	exit();
}