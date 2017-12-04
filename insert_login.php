<!--SYARIFAH-->
<html>
<body>  
<?php
/*to connect to database*/
$con = mysqli_connect("localhost","root","","havana"); 
if (!$con){
	/*the return error if connect fails*/
	die('Could not connect: ' . mysqli_connect_errno()); 
}
$query= $con->prepare("INSERT INTO `users` (`user_first`,`user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(?,?,?,?,?)");
$first='Anope';
$last = 'adminwd';
$email = 'lonely@gmail.com';
$uid = 'adminnin';
$pwd = '11223344';
/*bind the parameters*/
$query->bind_param('sssss', $first, $last, $email, $uid, $pwd); 
if ($query->execute()){  
  /*execute query*/
  echo "Query executed.";
}else{
  echo "Error executing query.";
}
?>
</body>
</html>
