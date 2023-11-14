<?php
require_once(dirname(__FILE__) . "/include/header.php");
// echo dirname(__FILE__) root path
?>
<form action="action/form_action.php" method="POST" class="p-5 text-bg-dark">
 <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Email address</label>
  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
 </div>
 <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
 </div>
 <div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
 </div>
 <input type="submit" class="btn btn-primary" name="insert" value="submit">
</form>

<div class="table-responsive my-3">

 <table class="table table-dark table-striped table-hover">

  <tr>
   <th>#</th>
   <th>Email</th>
   <th>Password</th>
   <th>Update</th>
   <th>DELETE</th>
  </tr>

  <?php

  $select_users_q = "SELECT * FROM `users`";

  $select_users_exe = $conn->query($select_users_q);

  // $row_user=$select_users_exe->fetch_assoc();
// $fetch_users=mysqli_fetch_assoc($select_users_exe);
  $count=1;
  while ($row_user = $select_users_exe->fetch_assoc()) {
?>

   <tr>
    <td><?php echo $count; ?></td>
    <td><?php echo $row_user["email"]; ?></td>
    <td><?php echo $row_user["password"]; ?></td>
    <!-- URL , URI , URL PARAM-->
    <!-- http://localhost/batch_2_to_5/project/form.php?username=dsahkjhdsa&&password=dsahjkdsahkj -->
    <td>
         <a href="./form_update.php?id=<?php  echo $row_user["user_id"]; ?>">UPDATE</a>
    </td>
    <!-- http://localhost/batch_2_to_5/project/form_update.php?id=1 -->
    <td>
         <a href="./form_delete.php?id=<?php  echo $row_user["user_id"]; ?>">DELETE</a>
    </td>
   </tr>

  <?php
  $count++;
  }
  ?>
 </table>

</div>
<?php
require_once(dirname(__FILE__) . "/include/footer.php");
// echo dirname(__FILE__) root path
?>