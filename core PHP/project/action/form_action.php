
 <?php

require_once(dirname(__DIR__) . "/include/header.php");

 if (isset($_POST["update"]) && !empty($_POST["update"])) {

  $email = filterData($_POST["email"]);
  $password = filterData($_POST["password"]);
  $user_id = filterData($_POST["user_id"]);

  // query save ki variable name $insert_q
 $update_q = "UPDATE `users` SET
   `email`='{$email}' , `password`= '{$password}' 
   WHERE `user_id`='{$user_id}'
   ";

  // queruy ko execute krna hai
 
  $update_exe = $conn->query($update_q);

  if ($update_exe) {
   $html = "<div class='alert alert-success' role='alert'>
 Data Has been Updated
</div>";
   echo $html;

   header("Refresh:2,url=../".HOME);
   // header("location =../form.php");
 

  }

 }


 if (isset($_POST["insert"]) && !empty($_POST["insert"])) {

  $email = filterData($_POST["email"]);
  $password = filterData($_POST["password"]);

  // query save ki variable name $insert_q
  $insert_q = "INSERT INTO `users` (`email`,`password`) 
 VALUES ('{$email}','{$password}') ";

  // queruy ko execute krna hai
 
  $insert_exe = $conn->query($insert_q);

  if ($insert_exe) {
   $html = "<div class='alert alert-success' role='alert'>
 Data Has been Inserted
</div>";
   echo $html;

   header("Refresh:2,url=../".HOME);
   // header("location =../form.php");
 

  }

 }


 ?>
 <!-- Bootstrap JavaScript Libraries -->
 
<?php
require_once(dirname(__DIR__) . "/include/footer.php");
// echo dirname(__FILE__) root path
?>