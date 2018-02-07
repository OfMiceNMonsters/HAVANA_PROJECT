<?php

if (isset($_POST['submit'])) {
	
	$conn = mysqli_connect("localhost", "root", "", "havana");

	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php");
		exit();
	} else {
		$sql = "SELECT * FROM usersandemail WHERE username='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_password']);
				if ($hashedPwdCheck == false) {
					echo 'Please try again, invalid username or password. <a href="<a href=C:\xampp\htdocs\prac\LOGIN_2_SYA\LOGIN_2_SYA\rootfolder\KHAI_HOMEPAGE\LOGIN_khai\rootfolder\index.php">Return to Homepage </a> ';
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_firstname'];
					$_SESSION['u_last'] = $row['user_lastname'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['username'];
					header("Location: ../main_afterlogin.php");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login=error");
	exit();
}
