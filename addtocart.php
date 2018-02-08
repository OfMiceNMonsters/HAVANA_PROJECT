<?php
if(isset($_POST["add_to_cart"]))
{
  if($_POST["add_to_cart"]=="yes")
  {
    $name=$_POST["name"];
    $image=$_POST["image"];
    $price=$_POST["price"];
    $size=$_POST["size"];

    $query=$conn->prepare("insert into cart4(name, image, price, size) values('$name','$image', '$price','$size');");
    if($query->execute())
    {
      header("Location: ../cart.php");
      exit();
    } 
  }
}
    ?>