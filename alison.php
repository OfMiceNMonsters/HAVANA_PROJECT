<!--alison-->

<!--insert header into page-->
<?php
  include_once 'includes/dbh.inc.php';
?>
<!-- Since the catalogue page was made to be a static php file,  the cart page had to follow the same format. Hence, the mockup. However, if the database was linked correctly, the following insert code could be inserted. -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <!--created a table to put entries in-->
  <div class="table-responsive">  
      <table border="1" class="table table-bordered">  
          <tr>  
          <th width="25%">Item Name</th>  
          <th width="20%">Quantity</th>  
          <th width="20%">Price</th>  
          <th width="20%">Total</th>  
          <th width="20%">Action</th>  
          </tr> 
<?php
  $sql = "SELECT * FROM cart;";
  $result = mysqli_query($conn, $sql);
  //check that they ARE results in the rows before spitting
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      //spit all of the entries in the db into the table using table format and with concatenating dots
      echo "<tr><td>".$row['description']."</td><td>" .$row["price"]."</td><td>".$row["size"]."</td><td>"."$40.50"."</td><td>"."Remove"."</td</tr>";
    }


  }
  
?>
    </table>
  </div>

</body>
</hmtl>
 
          
  <!-- if possible i would have also added in a regular expression to check the item

    $itemid= ' a-z0-9_-'
    $itemname= ''