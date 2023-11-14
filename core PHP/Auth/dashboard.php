<?php
require_once(dirname(__DIR__) . "/Auth/include/header.php");


if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) ) {

$user_id=$_SESSION["user_id"];

$user_q="SELECT * FROM `users` WHERE user_id ='{$user_id}'";

$user_q_exe= $link->query($user_q);

$fetch_assoc_user= $user_q_exe->fetch_assoc();

?>

<h1> Welcome TO Dashboard 
<?php 
echo $fetch_assoc_user["user_name"];
?>
 </h1>

 <form class="text-bg-dark p-5" enctype="multipart/form-data" method="POST" action="./action/form_php.php">
  <div class="mb-3">
    <label for="task" class="form-label">Enter Your Task</label>
    <input type="text" name="task_name" class="form-control" id="task" aria-describedby="emailHelp">
   
    <input type="hidden" name="user_Id" value="<?php echo $user_id; ?>">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Choose file</label>
    <input type="file" class="form-control" name="file" id="" placeholder="" aria-describedby="fileHelpId">
    <div id="fileHelpId" class="form-text">Help text</div>
  </div>
  <input type="submit" name="task" class="btn btn-primary">
</form>


<div class="table-responsive mt-3">

 <table class="table table-dark table-hover">
<tr>
 <th>#</th>
 <th>Image</th>
 <th>User name</th>
 <th>user Task</th>
 <th>Action</th>
</tr>

<?php
// JOIN

// $task_q="SELECT * FROM `user_task` WHERE user_id ='{$user_id}'";

$task_q="SELECT user_task.*,users.user_name,users.email FROM `user_task`

JOIN `users` ON user_task.user_id = users.user_id WHERE user_task.user_id='{$user_id}'";


$task_q_exe= $link->query($task_q);

$count=1;
while($row = $task_q_exe->fetch_assoc()) {
// pre($row);
?>

<tr>
 <td><?php echo $count; ?></td>
<?php 
if (isset($row["image"]) && !empty($row["image"])) {
 # code...

?>

 <td><img src="./uploads/<?php echo $row["image"] ?>" width="100" height="100" alt="" srcset=""></td>
 <?php } else {

 ?>
  <td><img src="./uploads/default.jpg" width="100" height="100" alt="" srcset=""></td>
<?php } ?>
 
 <td><?php echo $row["user_name"]  ?></td>
 <td><?php echo $row["task_name"] ?></td>
 <td><a href="./task_update.php?id=<?php echo $row["task_id"]  ?>">
   UPDATE
</a> </td>
</tr>

<?php
$count++;
}
 ?>
 </table>

</div> 


<?php


require_once(dirname(__DIR__) . "/Auth/include/footer.php");


}

else{
header("Location:".login);

}
?>