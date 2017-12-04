<!--alison-->

<?php
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<title>Havana </title>
<head>
		<title> Header </title>
		<link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>

		<!--white background-->
		<div class="container">
		<div class="content">
		<div id="example1">
<br>
<br>
<br>
<p align="center"> <strong> <big>  SHOPPING CART </big> </strong> </p>
<br>

<div>
<!-- the table configurations-->
<table border="1" align= "center" cellpadding="20" >
  <tr bgcolor="#dddddd">
    <th>Item</th>
    <th> Price </th>
    <th> Size </th>	
    <th> Action </th>
    <th> Total </th>
  </tr>
  <!--item 1-->
  <tr>
      <td> <div class="cartitems">
    <img src="https://i.pinimg.com/736x/60/2b/2d/602b2d86f845d4bef68bb85d31592576--vintage-nike-windbreaker-nike-windbreaker-jacket.jpg" width="180" height="200">
  </a>
  <div class="desc"> Nike Air Pro Jacket </div></td>
	</div>
    <td> $43</td>
    <td> S </td>
    <td>Remove</td>
    <td rowspan="2"> $143</td>

  </tr>
  <!-- item 2-->
  <tr>
    <td><div class="cartitems">
    <img src="https://i.pinimg.com/736x/d3/12/8d/d3128d2870cdf43d064285174582c9b3--vintage-nike-windbreaker-nike-windbreaker-jacket.jpg" width="180" height="200">
  </a>
  <div class="desc"> Vintage Nike Bold Limited Edition Jacket </div></td>
	</div>
    <td>$100</td>
    <td> M </td>
    <td >Remove </a></td>    
  </tr>
  <tr bgcolor="#b06776" align="center"> <td colspan="5"> <a href ="checkout.php" ><big>Checkout</big></a> </td> </tr>

</div>

<!-- end of page-->
<!-- i made a footer but it was not implemented
		<div class="footer">

			<h5> Facebook Havana Thrift</h5>
			<h5> Twitter: @havanathrift </h5>
			<p> <strong> © all rights reserved for HAVANA group project </strong> </p>
		</div>	
	-->
		</div>
		</div>
		</div>

</body>
</html>