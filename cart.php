<!--alison-->

<style>

.body {
  width: 100%;
  margin: auto;
  background:#FAFAFA;
  background: url(https://i.pinimg.com/originals/46/bb/2a/46bb2a02d21ea8ef34d81ec03c344e5d.jpg) fixed;font-family: "Lato", sans-serif;
}


.container {
  width: 960px;
  margin: 0 auto;
}

.content {

  width:1000px;
  height:1300px;

}

/*white background*/
#example1 {
    position: relative;
    display:block;
    width: 1000px;
    height: 1000px;
    overflow: auto;
    background: #FFFFFF;
    float:left;

}


/*table config*/
#table {
    font-family: arial, sans-serif;
    width: 100%; 
    border-collapse: separate;
    margin-top: 1px;
    padding: 20px;
    border: 1px solid ;
    text-align: center;
}

.td {
    border: 1px solid #dddddd;
    padding: 50px;
    text-align: center;
}

.th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 50px;
}

}
/*contact or references grey area at bottom of page*/
.footer {
  position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: grey;
    color: white;
    font-size:15px;
    text-align: center;
}

</style>

<?php
  include_once 'afterloginsuccessful.php';
  include_once 'includes/dbh.inc.php';
?>

<?php
  if(isset($_GET['operation'])){
    if($_GET['operation']=="delete")
    {
      $query=$conn->prepare("delete from cart4 where prod_id=".$_GET['prod_id']);
      if($query->execute())
      {
        echo '<script>alert("Item deleted from cart")</script>';  
        $sql = "select * FROM cart4;";
        $result = mysqli_query($conn, $sql);
        //check that they ARE results in the rows before spitting
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
          echo '<script>window.location="cart.php"</script>';

        }
        else{
          echo '<script>window.location="cartempty.php"</script>';                
        }

      }
    }
  }

?>


<!DOCTYPE html>
<html>
<title>Havana </title>
<head>
		<link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>

		<!--white background-->
		<div class="container">
		<div class="content">
      <br>
		<div id="example1">
    <!--if cart is not empty then spit it out, else, redirect to cart is empty page-->
    <?php 
     
        $sql = "select * FROM cart4;";
        $result = mysqli_query($conn, $sql);
        //check that they ARE results in the rows before spitting
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
    ?>      

    <br>
    <br>
    <br>
    <p align="center"> <strong> <big>  SHOPPING CART </big> </strong> </p>

    <br>
    <div align="center">
    <img src ="http://images.all-free-download.com/images/graphicthumb/cute_hand_drawn_hang_the_clothes_vector_background_544465.jpg">
    <img src ="http://images.all-free-download.com/images/graphicthumb/cute_hand_drawn_hang_the_clothes_vector_background_544465.jpg">
    </div>
      <div align="center">
      <!-- the table configurations-->
      <?php  

            $query=$conn->prepare("select * from cart4");
            $query->execute();
            $query->bind_result($prod_id, $description, $image, $price, $size);
            echo "<table align='center' border='1' cellpadding='10' type=table>";
            echo "<tr bgcolor='dddddd'>";
            echo "<th>Item</th>";
            echo "<th width='20%'>Description</th>";
            echo "<th width='10%'>Price</th>";
            echo "<th width='10%'>Size</th>";
            echo "<th width='10%'>Action</th>";
            echo "</tr>";
            while($query->fetch())
            {
              echo "<tr align='center'>";
              echo "<td>"."<img src=$image style='width:30%'>"."</td>"; 
              echo "<td>".$description."</td>";
              echo "<td> $".$price."</td>";
              echo "<td>".$size."</td>";
              echo "<td><a href='cart.php?operation=delete&prod_id=".$prod_id."'>Delete</a></td>";
              echo "</tr>"; 
              
            }

            echo "</table>";

            echo "<br>";
            echo "<br>";

            //tabulate total
            $count = mysqli_query($conn, "SELECT sum(price) from cart4");
            $total= mysqli_fetch_array($count);
            //tell customer how much they spent on jackets and more jackets
            echo "<strong>Total = </strong>". "$".$total[0]. " (without gst and shipping)";
            echo "<br>";
            echo "<br>";

      ?>    
      <!-- need to post the results to the checkout yo, talk to syar-->           
      <br>
      <form action="./checkout.php">

      <input type="submit" value="Checkout">

      </form>
      </div>
    <?php
        }
        else{
          echo '<script>window.location="cartempty.php"</script>';                
        }

     ?>

		</div>
		</div>
		</div>

    <?php
      include_once 'footer.php';
    ?>
</body>

</html>
