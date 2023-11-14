
<?php
require_once(dirname(__FILE__) . "/include/header.php");
// echo dirname(__FILE__) root path
?>

<?php 

if (checkGet("id")) {
 # code...

 $user_id = $_GET["id"];

 $S_user_data="DELETE FROM `users` WHERE user_id='{$user_id}'";

 $exe_user_data=$conn->query($S_user_data);

 if($exe_user_data){

  echo "DATA HAS BEEN DELETED";
  header("Refresh:2,url=".HOME);
 }

 // http://localhost/batch_2_to_5/project/form_update.php?id=1
} else {
 header("Location:".HOME);
}
?>

<?php
require_once(dirname(__FILE__) . "/include/footer.php");
// echo dirname(__FILE__) root path
?>
