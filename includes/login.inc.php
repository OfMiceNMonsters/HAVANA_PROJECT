<?php

$conn = mysqli_connect("localhost", "root", "", "havana");;

function strip_tag($string) { 

	// strip html & php tags
	$string = strip_tags($string);
	// strip control characters
	return preg_replace('/[[:punct:]]/', ' ', $string);

}

if (isset($_POST['submit'])) {
	

	$uid = strip_tags($_POST['uid']);
	$pwd = strip_tags($_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					echo 'Please try again, invalid username or password. <a href="index.php">Return to Homepage </a> ';
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
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
