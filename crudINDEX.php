<!--SYARIFAH-->
<?php
$connect=mysqli_connect("localhost","root","","havana");


if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
		$description=$_POST["description"];
		$size=$_POST["size"];
		$price=$_POST["price"];
		$query=$connect->prepare("insert into listing(DESCRIPTION, SIZE, PRICE) values('$description', '$size', '$price');");
		if($query->execute())
		{
			echo "<center>Record Inserted!</center><br>";
		}
	}
}

if(isset($_POST["update"])){
	if($_POST["update"]=="yes")
	{

	$description=$_POST["description"];
	$size=$_POST["size"];
	$price=$_POST["price"];
	
	$query=$connect->prepare("update listing set LISTING_ID='$listing_id', DESCRIPTION='$description' , SIZE='$size', PRICE='$price' where LISTING_ID=".$_POST['listing_id']);
	if($query->execute())
	{
		echo "<center>Record Updated!</center><br>";
	}
	}
}

if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$query=$connect->prepare("delete from listing where LISTING_ID=".$_GET['listing_id']);
		if($query->execute())
		{
			echo "<center>Record Deleted!</center><br>";
		}
	}
}
?>
<html>
<body>
<b><center>CRUD</center></b>
<form method="post" action="index.php">
<table align="center" border="0">
<tr>
<td>description:</td>
<td><input type="text" name="description" /></td>
</tr>
<tr>
<td>size:</td>
<td><input type="text" name="size" /></td>
</tr>
<tr>
<td>price:</td>
<td><input type="text" name="price" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Insert Record"/>
</td>
</tr>
</table>
</form>

<?php
$query=$connect->prepare("select * from listing");
$query->execute();
$query->bind_result($listing_id, $description,$size, $price);
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>LISTING_ID</th>";
echo "<th>DESCRIPTION</th>";
echo "<th>SIZE</th>";
echo "<th>PRICE</th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$listing_id."</td>";
	echo "<td>".$description."</td>";
	echo "<td>".$size."</td>";
	echo "<td>".$price."</td>";
	echo "<td><a href='edit.php?operation=edit&listing_id=".$listing_id."&description=".$description."&size=".$size."&price=".$price."'>edit</a></td>";
	echo "<td><a href='index.php?operation=delete&listing_id=".$listing_id."'>delete</a></td>";
	echo "</tr>";	
	
}
echo "</table>";
?>
</body>
</html>