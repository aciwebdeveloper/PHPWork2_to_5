<?php
require_once("../helper.php");
connectionMySQl();

?>

<!doctype html>
<html lang="en">

<head>
 <title>PHP and MYSQL configuration</title>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Bootstrap CSS v5.2.1 -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


 <?php

 if (isset($_POST["submit"]) && !empty($_POST["submit"])) {

  $user_name = filterData($_POST["user_name"]);
  $password = filterData($_POST["password"]);
  $f_name = filterData($_POST["first_name"]);
  $l_name = filterData($_POST["l_name"]);
  $email = filterData($_POST["email"]);

  $insert_q = "INSERT INTO `users` (`user_name`,`email`,`password`) 
 VALUES ('{$user_name}','{$email}','{$password}')";

  // $insert = mysqli_query($link, "$insert_q"); this is core php method
  $insert = $link->query("$insert_q");

  if ($insert) {
   echo "<div class='alert alert-success' role='alert'>
Data Has been Inserted
</div>";
  }
 }



 if (isset($_POST["update"]) && !empty($_POST["update"])) {


  $user_name = filterData($_POST["user_name"]);
  $password = filterData($_POST["password"]);
  // $f_name = filterData($_POST["first_name"]);
  // $l_name = filterData($_POST["l_name"]);
  $email = filterData($_POST["email"]);
  $user_id = filterData($_POST["user_id"]);

  $update_q = "UPDATE `users` SET  
  `user_name`='{$user_name}',
  `email`='{$email}',
  `password`='{$password}'  
   WHERE id ='{$user_id}'
  ";

  // `${}`
  // $insert = mysqli_query($link, "$insert_q"); this is core php method
  $update = $link->query("$update_q");

  if ($update) {
   echo "<div class='alert alert-success' role='alert'>
Data Has been updated
</div>";
  }

 }


 if (isset($_POST["delete"]) && !empty($_POST["delete"])) {
  $user_id = filterData($_POST["user_id"]);

  $delete_q = "DELETE FROM `users`  
   WHERE id ='{$user_id}'
  ";

  // `${}`
  // $insert = mysqli_query($link, "$insert_q"); this is core php method
  $delete = $link->query("$delete_q");

  if ($delete) {
   echo "<div class='alert alert-success' role='alert'>
Data Has been Deleted
</div>";
  }

 }
 ?>


 <div class="container-fluid">

  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="row g-3 p-5 needs-validation" method="POST" novalidate>


   <div class="col-md-12">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <div class="valid-feedback">
     Looks good!
    </div>
   </div>
   <div class="col-md-6">
    <label for="first_name" class="form-label">First name</label>
    <input type="text" class="form-control" name="first_name" id="first_name" value="Mark" required>
    <div class="valid-feedback">
     Looks good!
    </div>
   </div>

   <div class="col-md-6">
    <label for="l_name" class="form-label">Last name</label>
    <input type="text" class="form-control" id="l_name" name="l_name" required>
    <div class="valid-feedback">
     Looks good!
    </div>
   </div>
   <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
     <span class="input-group-text" id="user_name">@</span>
     <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="inputGroupPrepend"
      required>
     <div class="invalid-feedback">
      Please choose a username.
     </div>
    </div>
   </div>

   <div class="col-md-6">
    <label for="password" class="form-label">Password</label>
    <div class="input-group has-validation">
     <span class="input-group-text" id="inputGroupPrepend">
      <i class="fas fa-user-lock    "></i>
     </span>
     <input type="password" class="form-control" name="password" id="password" aria-describedby="inputGroupPrepend"
      required>
     <div class="invalid-feedback">
      Please choose a username.
     </div>
    </div>
   </div>


   <div class="col-12">
    <div class="form-check">
     <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
     <label class="form-check-label" for="invalidCheck">
      Agree to terms and conditions
     </label>
     <div class="invalid-feedback">
      You must agree before submitting.
     </div>
    </div>
   </div>
   <div class="col-12">
    <input class="btn btn-primary" type="submit" name="submit">
   </div>
  </form>

 </div>


 <section class="container-fluid">



  <div class="table-responsive">
   <table class="table table-striped table-dark table-hover">
    <tr>
     <th>#</th>
     <th>User name</th>
     <th>Email</th>
     <th>Password</th>
     <th>UPdate</th>
     <th>DElete</th>
    </tr>

    <?php
    $select_q = "SELECT * FROM `users`";

    // $insert = mysqli_query($link, "$insert_q"); this is core php method
    $select = $link->query("$select_q");

    // $row = mysqli_fetch_assoc($select);
    // $row = $select->fetch_assoc();
    
    // echo $num_row=$select->num_rows;
    $count=1;
    while ($row = $select->fetch_assoc()) {


     ?>

    <tr>
     <td>
      <?php echo $count; ?>
     </td>
     <td>
      <?php echo $row["user_name"]; ?>
     </td>
     <td>
      <?php echo $row["email"]; ?>
     </td>
     <td>
      <?php echo $row["password"]; ?>
     </td>
     <td>
      <a href="#" data-id="<?php echo $row["id"]; ?>" data-email="<?php echo $row["email"]; ?>"
       data-user=" <?php echo $row["user_name"]; ?>" data-password="<?php echo $row["password"]; ?>"
       data-bs-target="#editForm" data-bs-toggle="modal"
       class="edit link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
       <i class="fa fa-pencil" aria-hidden="true"> EDIT</i>
      </a>
     </td>
     <td>
      <a href="#" data-bs-target="#deleteForm" data-bs-toggle="modal" data-delete_id="<?php echo $row["id"]; ?>"
       class="delete link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
       <i class="fa fa-trash" aria-hidden="true"> DELETE</i>
      </a>
     </td>
    </tr>

    <?php
    $count++;
    }
    // endwhile;
    ?>
   </table>
  </div>


  <!-- modal section start -->

  <div class="modal fade" id="editForm" aria-hidden="true" aria-labelledby="editForm" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
     <div class="modal-header">
      <h1 class="modal-title fs-5" id="editForm">Edit Data</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">

      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="row g-3 needs-validation" method="POST" novalidate>

       <input type="hidden" id="user_id" name="user_id">
       <div class="col-md-12">
        <label for="emailEdit" class="form-label">Email</label>
        <input type="email" class="form-control" id="emailEdit" name="email" required>
        <div class="valid-feedback">
         Looks good!
        </div>
       </div>

       <div class="col-md-6">
        <label for="user_nameEdit" class="form-label">Username</label>
        <div class="input-group has-validation">
         <span class="input-group-text" id="user_name">@</span>
         <input type="text" class="form-control" id="user_nameEdit" name="user_name"
          aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
          Please choose a username.
         </div>
        </div>
       </div>

       <div class="col-md-6">
        <label for="password_edit" class="form-label">Password</label>
        <div class="input-group has-validation">
         <span class="input-group-text" id="inputGroupPrepend">
          <i class="fas fa-user-lock    "></i>
         </span>
         <input type="password" class="form-control" name="password" id="password_edit"
          aria-describedby="inputGroupPrepend" required>
         <div class="invalid-feedback">
          Please choose a username.
         </div>
        </div>
       </div>



       <div class="col-12">
        <input class="btn btn-primary" type="submit" name="update" value="update">
       </div>
      </form>


     </div>

     <div class="modal-footer">

     </div>
    </div>
   </div>
  </div>
  <!-- modal section end -->




  <!-- modal delete section start -->

  <div class="modal fade" id="deleteForm" aria-hidden="true" aria-labelledby="deleteForm" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
     <div class="modal-header">
      <h1 class="modal-title fs-5" id="deleteForm">DELETE Data</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
      <h3> Are You Sure You!</h3>
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="row g-3 needs-validation" method="POST" novalidate>

       <input type="hidden" id="user_del_id" name="user_id">
       <div class="col-12">
        <input class="btn btn-primary" type="button" data-bs-dismiss="modal" aria-label="Close" name="delete"
         value="Cancel">
        <input class="btn btn-primary" type="submit" name="delete" value="YES">
       </div>
      </form>


     </div>

     <div class="modal-footer">

     </div>
    </div>
   </div>
  </div>
  <!-- modal delete section end -->

 </section>

 <!-- Bootstrap JavaScript Libraries -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
 </script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
 </script>

 <script>
 let deletes = document.querySelectorAll(".delete");

 for (let index = 0; index < deletes.length; index++) {
  deletes[index].addEventListener("click", function() {

   let a = deletes[index];

   let id = a.dataset.delete_id;

   // let emailEdit=document.querySelector("#emailEdit");

   user_del_id.value = id
   // console.log(user_name)
   // let a=this;


  })
 }
 </script>

 <script>
 let edit = document.querySelectorAll(".edit");

 for (let index = 0; index < edit.length; index++) {
  edit[index].addEventListener("click", function() {

   let a = edit[index];
   let user_name = a.dataset.user;
   let password = a.dataset.password;
   let email = a.dataset.email;
   let id = a.dataset.id;

   // let emailEdit=document.querySelector("#emailEdit");

   emailEdit.value = email;
   user_nameEdit.value = user_name;
   password_edit.value = password;
   user_id.value = id
   // console.log(user_name)
   // let a=this;


  })
 }



 console.log(edit)
  (() => {
   'use strict'

   // Fetch all the forms we want to apply custom Bootstrap validation styles to
   const forms = document.querySelectorAll('.needs-validation')

   // Loop over them and prevent submission
   Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
     if (!form.checkValidity()) {
      event.preventDefault()
      event.stopPropagation()
     }

     form.classList.add('was-validated')
    }, false)
   })
  })()
 </script>
</body>

</html>