<?php

  //session management. In every session, generate its own token to check for time validity 

if(!isset($_SESSION['token'])){

  //uniqid abit dangerous though because it does not have any encrpyted capabilities.
  $_SESSION['token'] = md5(uniqid(rand(), TRUE))
  //16 bytes would give 32 hexadecimal
  //$sid = openssl_random_pseudo_bytes(16);
    //$sid = bin2hex($sid);
}

//if the posted token is the session id given
if($_POST['token'] == $_SESSION['token']){
  $age_token = time() - $_SESSION['token_time'];
  if($age_token <= 1800){ //limit the validity of token. counts in min? we give 30mins? 60*30=1800

    //so if you don't have a session id, never login so, redirect to index.php
    if(!isset($_SESSION['user_id'])){
      header("Location: ../index.php");

    }else{

      //if the session has been set, the if else loop will check if user is an admin or not 
      if(isset($_SESSION['role'] == 'admin')){
        //if admin, then redirect them to the admin page
        header("Location: ../crudINDEX.php");
      else(
        //if it is not an admin, it would be a normal user
        //redirect to member page
        header("Location: ../main_afterlogin.php")

      )
    }

  } 
}
else{
  //if the token is not set then means that the session token has expired.
  header("Location: ../index.php?session=timeout")
  
}
}

  ?>
