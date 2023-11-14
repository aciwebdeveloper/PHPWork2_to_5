<?php
require_once(dirname(__DIR__) . "/Auth/include/header.php");


if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) ) {

$user_task=$_GET["id"];

$user_q="SELECT * FROM `user_task` WHERE task_id='{$user_task}'";

$user_q_exe= $link->query($user_q);

$fetch_assoc_user= $user_q_exe->fetch_assoc();
// pre($fetch_assoc_user);
?>


 <form class="text-bg-dark p-5" enctype="multipart/form-data" method="POST" action="./action/form_php.php">
  <div class="mb-3">
    <label for="task" class="form-label">Enter Your Task</label>
    <input type="text" name="task_name" value="<?php echo $fetch_assoc_user["task_name"] ?>" class="form-control" id="task" aria-describedby="emailHelp">
   
    <input type="hidden" name="task_Id" value="<?php echo $user_task; ?>">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Choose file</label>
    <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId">
    <div id="fileHelpId" class="form-text">Help text</div>
  </div>
  <?php 
if (isset($fetch_assoc_user["image"]) && !empty($fetch_assoc_user["image"])) {
 # code...

?>

 <img src="./uploads/<?php echo $fetch_assoc_user["image"] ?>" width="100" height="100" alt="" srcset="">
 <?php } else {

 ?>
 <img src="./uploads/default.jpg" width="100" height="100" alt="" srcset="">
<?php } ?>
 
  <input type="submit" name="task_update" class="btn btn-primary">
</form>




<?php


require_once(dirname(__DIR__) . "/Auth/include/footer.php");


}

else{
header("Location:".login);

}
?>