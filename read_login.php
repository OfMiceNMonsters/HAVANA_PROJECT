<!--SYARIFAH-->
<?php
/*to connect to database*/
$con=mysqli_connect("localhost","root","","havana");
/*check connection*/
if (mysqli_connect_errno())
  {
  /*the return error if connect fails*/
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT user_first, user_last, user_email,user_uid FROM users";
$result=mysqli_query($con,$sql);

/*associative array so only those you ask for will be read out as input*/
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
printf ("%s %s (%s) (%s)\n",$row["user_first"], $row["user_last"], $row["user_email"], $row["user_uid"]);

// Free result set
mysqli_free_result($result);

mysqli_close($con);