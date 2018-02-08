<?php
	include_once 'header.php';  
 $conn = mysqli_connect("localhost", "root", "", "havana");
?>

<?php
/*
//session management. In every session, generate its own token to check for time validity  
//if the posted token is the session id given
if($_POST['token'] == $_SESSION['token']){
  $age_token = $_SESSION['token_time'] - time();
  if($age_token <= 60){ //limit the validity of token. counts in min? we give 30mins? 60*30=1800

    //so if you don't have a session id, never login so, redirect to index.php
    if(!isset($_SESSION['user_id'])){
      header("Location: ../index.php");

    }else{

      //if the session has been set, the if else loop will check if user is an admin or not 
      if($_SESSION['role'] == 'admin'){
        //if admin, then redirect them to the admin page
        header("Location: ../crudINDEX.php");
      }else{
        //if it is not an admin, it would be a normal user
        //redirect to member page
        header("Location: ../index.php");

      
    }

  } 
}
}
else{
  //if the token is not set then means that the session token has expired.
  header("Location: ../index.php?session=timeout");
  
}
*/
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
                $result = mysqli_query($conn, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?> 
                <div class="column" style="background-color: white;">
                <div class ="row">  
                     <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
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
      if (isset($_SESSION['user_id'])) {
        echo "$_SESSION['user_id']";
      }
    ?>
  </div>
</section>

<?php
  include_once 'footer.php';
?>
