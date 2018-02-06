<?php
	include_once 'afterlogin.php';
	$connect = mysqli_connect("localhost", "root", "", "havana");
?>


<?php
if(isset($_POST["insert"]))
{
	if($_POST["insert"]=="yes")
	{
		$name=$_POST["name"];
		$image=$_POST["image"];
		$price=$_POST["price"];
		$price=$_POST["size"];

		$query=$conn->prepare("insert into cart(name, image, price, size) values('$name','$image', '$price','$size');");
		if($query->execute())
		{
			header("Location: ../cart.php");
			exit();
		} 
	}
}
		?>

<!DOCTYPE html>
<html>
<title>HAVANA</title>
<section class="container">

    <div class="content">

      <br>
      <br>
      <br>



       <?php  
                $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
                <div class="column" style="background-color: white;">
                <div class ="row">  
                     <form method="post" action="/cart.php">
                          <br>
                          <br>  
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" alt="Avatar" class="image" style="width:100%"/><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                      </div>
                      </div>
                  </div>
                     </form>  
             </div> 
                <?php  
                     }  
                }  
                ?>      

		<?php
			if (isset($_SESSION['u_id'])) {
				echo "You are logged in!";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
