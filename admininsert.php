<?php
	include_once 'dbh.inc.php';
	
if (isset($_POST['insert'])) {
	

if($_POST["insert"]=="yes")
{
	if (empty($name) || empty($image) || empty($price) || empty($size)) {
		header("Location: ../crudindex.php?input=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]+$/", $name)) {
			header("Location: ../crudindex.php?insert=invalid");
			exit();
		} else {

				$sql = "SELECT * FROM tbl_product WHERE name='$name'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: ../crudindex.php?insert=nametaken");
					exit();
				} else {
					$sql = "SELECT * FROM tbl_product WHERE image='$image'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						header("Location: ../crudindex.php?insert=repeatedimage");
						exit();

					}	else {
					$sql = "SELECT * FROM tbl_product WHERE size='$size'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						header("Location: ../crudindex.php?insert=repeatedimage");
						exit();

					}else{
					//Insert the item into the database
					$query = $connect-> prepare("INSERT INTO tbl_product (name,image, price, size) VALUES ('$name', '$image', '$price', '$size');");
					if($query->execute())
		{
			echo "<center>Successful!</center><br>";
		}
					mysqli_query($conn, $sql);
					header("Location: ../crudindex.php");
					exit();
					}
				}
			}
		}


} else {
	header("Location: ../crudindex.php");
	exit();
}
?>
