<!--alison-->

<!--this is part 2 of alison.php but with delete. I have done what i could and hope that you could see my efforts in doing so-->
<?php 
	session_start();
	include 'dbh.inc.php';
	//the remove button at the side of the screen would correlate the id with the row of content
	if (isset($GET["listing_id"])){
		//delete from the database primary key which would delete the item as a whole
		$connection -> query("DELETE FROM cart WHERE listing_id =".$_GET["id"]);

	}
	//if successful, should show this that the delete is successful
	header("Location: ../cart.php?delete=success"
	exit()
?> 

