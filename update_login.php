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
$query= $con->prepare("UPDATE users SET user_email=? WHERE user_first=?");
$email = 'khai@email.com';
$first = 'syarifah';
/*bind the parameters*/
$query->bind_param('ss', $email, $first); 
if ($query->execute()){
  /*execute query*/
  echo "Query executed.";
}else{
  echo "Error executing query.";
}
?>
</body>
</html>
