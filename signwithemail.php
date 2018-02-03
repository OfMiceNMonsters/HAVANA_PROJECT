<?php
	include_once 'signupheadercap.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<!--add a class to form to add the style for sign up-->
		<!--action tells form which file to load once clicked on submit button-->
		<!--then create method in which u want to pass on data to the file-->
		<!--GET method is see all the info passed in the url-->
		<!--use POST method cause dont want to show password // dont want to pass info in a visible way-->
		<div id="example1">
			<!--just to show that you're at main page-->
			<h2>Register</h2>
			<?php 
			$msg= " ";
			//use PHPMailer\PHPMailer\PHP;
				if (isset($_POST['submit']))
				{
					include_once 'C:/xampp/htdocs/combined_havana/includes/dbh.inc.php';
					$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
					$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
					$email = mysqli_real_escape_string($conn, $_POST['email']);
					$username = mysqli_real_escape_string($conn, $_POST['username']);
					$password = mysqli_real_escape_string($conn, $_POST['pwd']);
					$repassword = mysqli_real_escape_string($conn, $_POST['repwd']);
					
					//if email used, they will say email used
					$sql = "SELECT user_id FROM usersandemail WHERE user_email='$email'";
					mysqli_query($conn, $sql);
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if($resultCheck > 0)
					{
						$msg="Email used, please try again.";
					}
					else
					{
						header("Location: ../index.php");
						//require_once "C:/xampp/htdocs/combined_havana/PHPMailer/PHPMailer.php";
						//include_once "C:/xampp/htdocs/combined_havana/PHPMailer/PHPMailer.php";
						//make a token with random string
						//require_once('C:/xampp/htdocs/combined_havana/cryptolib.php');
						//$token= CryptoLib::randomString(24);
						$token='qazzwsxedcrfvtgbyhnujmikolp';
						$token=substr($token,0,15);
						
						//perform this query if the email is not used
						$sql = "INSERT INTO usersandemail (user_firstname, user_lastname, username, user_email,user_password,email_verified, token) VALUES ($firstname,$lastname,$email,$username,$password,'0','$token')";
						
						
						//$mail= new PHPMailer;
						//require "C:/xampp/htdocs/combined_havana/PHPMailer-master/Exception.php";
						require 'C:/xampp/htdocs/combined_havana/PHPMailer-master/autoload.php';
						require "C:/xampp/htdocs/combined_havana/PHPMailer-master/PHPMailer.php";
						$mail = new PHPMailer\PHPMailer\PHPMailer();
						$mail->setFrom('havana@gmail.com');
						$mail->addAddress($email,$username);
						$mail->Subject="Email Verification";
						$mail->isHTML(true);
						$mail->Body="Click here to verify your email: <br><br> <a href='http://localhost/combined_havana/
						verify.php?=$email & token=$token'>Click Here</a>";
						
					}
					
					//if($mail=send)
					//{
						//$msg="the verify email isnt here";
					//}
				}
			?>
			<form class="signup-form" action="signwithemail.php" method="POST">
				<input type="text" name="firstname" placeholder="First Name" required pattern="^([a-zA-Z]+$)" title="Please input only characters from A-Z.">
				<input type="text" name="lastname" placeholder="Last Name" required pattern="^([a-zA-Z]+$)" title="Please input only characters from A-Z.">
				<input type="email" name="email" placeholder="E-mail" required>
				<input type="text" name="username" placeholder="Username" required >
				<input type="password" name="pwd" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be at least 8 characters long with one uppercase character and one number. Please try again." required>
				<input type="password" name="repwd" id="retypepassword" placeholder="Retype Password" required> 
<!--Script to check password -->
				<script type="text/javascript">
	var password = document.getElementById("password")
  , retypepassword = document.getElementById("retypepassword");

function validatePassword(){
  if(password.value != retypepassword.value) {
    retypepassword.setCustomValidity("Passwords Don't Match");
  } else {
    retypepassword.setCustomValidity('');
  }
}

password.onchange = validatePassword;
retypepassword.onkeyup = validatePassword;
</script>
				<br>
				<br>
				<div class="g-recaptcha" data-sitekey="6Le6ukAUAAAAAAeE9qQcAmLoM3Cw5r-1fMCPzkcr" required></div>
				<br>
				<button type="submit" name="submit">Sign Up</button>
			</form>
		</div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>