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
$query= $con->prepare("DELETE FROM users WHERE user_first=?");
$first = 'buny';
/*bind the parameters*/
$query->bind_param('s', $first); 
  /*execute query*/
  echo "Query executed.";
}else{
  echo "Error executing query.";
}
?>
</body>
</html>
