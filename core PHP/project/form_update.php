<?php
require_once(dirname(__FILE__) . "/include/header.php");
// echo dirname(__FILE__) root path

 // echo $_GET["id"];

 if (isset($_GET["id"]) && !empty($_GET["id"])) {
  # code...

  $user_id= $_GET["id"];

  $S_user_data="SELECT * FROM `users` WHERE user_id='{$user_id}'";
  
  $exe_user_data=$conn->query($S_user_data);
  
  $row_user_data=  $exe_user_data->fetch_assoc();
  
  // http://localhost/batch_2_to_5/project/form_update.php?id=1
 }
 else{
  header("Location:".HOME);
 }

 
?>

<!-- http://localhost/batch_2_to_5/project/form_update.php?id=1 -->
<form action="action/form_action.php" method="POST" class="p-5 text-bg-dark">
<input type="hidden" name="user_id" value="<?php echo $_GET["id"] ?>">

 <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Email address</label>
  <input type="email" value="<?php echo $row_user_data["email"] ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
 </div>
 <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="password" value="<?php echo $row_user_data["password"] ?>" name="password" class="form-control" id="exampleInputPassword1">
 </div>
 <div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
 </div>
 <input type="submit" class="btn btn-primary" name="update" value="submit">
</form>



<?php
require_once(dirname(__FILE__) . "/include/footer.php");
// echo dirname(__FILE__) root path
?>