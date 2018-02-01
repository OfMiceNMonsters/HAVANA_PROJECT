<?php
$conn=mysqli_connect("localhost","root","","havana");


if(isset($_POST["insert"]))
	{
		/*$name=$_POST["name"];
		$image=$_POST["image"];
		$price=$_POST["price"];

		$query=$conn->prepare("insert into tbl_product(name, image, price) values('$name','$image', '$price');");
		if($query->execute())
		{
			echo "<center>Record Inserted!</center><br>";
		} */


		require_once 'admininsert.php';
	}


if(isset($_POST["update"])){
	if($_POST["update"]=="yes") 
	{

	$name=$_POST["name"];
	$price=$_POST["price"];
	$image=$_POST["image"];
	$size=$_POST["size"];
	
	$query=$conn->prepare("update tbl_product set name='$name' , image='$image' , price='$price' , size='$size' where id=".$_POST['id']);
	if($query->execute())
	{
		echo "<center>Item Updated!</center><br>";
	}
	}
}

if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$query=$conn->prepare("delete from tbl_product where id=".$_GET['id']);
		if($query->execute())
		{
			echo "<center>Database item Deleted!</center><br>";
		}
	}
}
?>
<html>
<body>
<br>
<h1><center>ADMIN</center></h1>
<br>
<form method="post" action="crudINDEX.php">
<table align="center" border="0">
<tr>
<td>Name:</td>
<td><input type="text" name="name" /></td>
</tr>
<tr>
<td>Image URL:</td>
<td><input type="text" name="image" /></td>
</tr>
<tr>
<td>Price:</td>
<td><input type="text" name="price" /></td>
</tr>
<tr>
<td>Size:</td>
<td><input type="text" name="size" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Insert Into Database"/>
</td>
</tr>
</table>
</form>

<?php
$query=$conn->prepare("select * from tbl_product");
$query->execute();
$query->bind_result($id, $name,$image, $price, $size);
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NAME</th>";
echo "<th>PHOTO URL</th>";
echo "<th>SIZE</th>";
echo "<th>PRICE</th>";
echo "<th colspan='2'>ACTION</th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$id."</td>";
	echo "<td>".$name."</td>";
	echo "<td>".$image."</td>";
	echo "<td>$".$price."</td>";
	echo "<td>".$size."</td>";
	echo "<td><a href='crudUPDATE.php?operation=edit&id=".$id."&name=".$name."&image=".$image."&price=".$price."&size=".$size."'>Edit</a></td>";
	echo "<td><a href='crudINDEX.php?operation=delete&id=".$id."'>Delete</a></td>";
	echo "</tr>";	
	
}
echo "</table>";
?>

<br>
<br>
<div align="center">
		
	<a href="index.php"><big>Go to HAVANA Oo NANA</big></a>

</div>
</body>
</html>