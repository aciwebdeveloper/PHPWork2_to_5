<?php
require_once(dirname(__DIR__) . "/include/header.php");
?>

<?php

if (isset($_POST["login"]) && !empty($_POST["login"])) {

   $email = filterData($_POST["email"]);
   $password = filterData($_POST["password"]); //1234

   $encryptPass = base64_encode($password);

   $hash_pass = hash("sha256", $password);

   $combineHashing = $hash_pass . "/" . $encryptPass;


   $check_user_q = "SELECT * FROM `users` 
WHERE `email`='{$email}' AND `password`='{$combineHashing}' ";

   $check_user_exe = $link->query($check_user_q);

   if ($check_user_exe) {

      if ($check_user_exe->num_rows > 0) {

         $fetch = $check_user_exe->fetch_assoc(); // associative array jonsa user login hua hai
         // save user id in session
         $_SESSION["user_id"] = $fetch["user_id"];

         echo "<div class='alert alert-success' role='alert'>
LOGIN SuccessFUll
</div>";

         header("Refresh:2,url=../" . Dashboard);

      } else {
         echo "<div class='alert alert-danger' role='alert'>
   You'r not a registered in our portal
 </div>";
         header("Refresh:2,url=../" . HOME);
      }


   }

}




if (isset($_POST["signup"]) && !empty($_POST["signup"])) {

   $email = filterData($_POST["email"]);
   $user_name = filterData($_POST["user_name"]);
   $password = filterData($_POST["password"]);
   /* 
   hash('algorithm', password)
   encrypting 
   base64
   */
   $encryptPass = base64_encode($password);

   $hash_pass = hash("sha256", $password) . "/" . $encryptPass;


   // echo $hash_pass;
   $check_user_q = "INSERT INTO `users` (`user_name`,`email`,`password`,`bActive`)
 VALUES ('{$user_name}','{$email}','{$hash_pass}','{$encryptPass}')
 ";

   $check_user_exe = $link->query($check_user_q);
   if ($check_user_exe) {

      // var abc= "jdksajdsa"+dsakjl+"dsadsa";
      echo "<div class='alert alert-success' role='alert'>
   Register SuccessFull
</div>";
      // 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4/MTIzNA==

      $_SESSION["user_id"] = $link->insert_id;

      header("Refresh:2,url=../" . Dashboard);

   }
}

if (isset($_POST["task_update"]) && !empty($_POST["task_update"])  ) {

   $task_Id = $_POST["task_Id"];
   $task_name = $_POST["task_name"];

   // pre($_FILES["file"]);
   if (isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"]) ) {

      $file = $_FILES["file"];
      // pre($file);
// form file start
      $allowedExtention = ["png", "jpg", "jpeg"];


      $temp_name = $file["tmp_name"];
      $file_name = $file["name"];

      $fileType = explode(".", $file_name);

      $fileExt = strtolower($fileType[1]); //PNG png

      if (!in_array($fileExt, $allowedExtention)) {
         echo "ERROR";
      }
      // form file end
// delete prv file

      $fetch_file_q = "SELECT * FROM `user_task` WHERE task_id=$task_Id";
    
      $exe_file = $link->query($fetch_file_q);
      
      if ($exe_file) {
         $fetch_files= $exe_file->fetch_assoc();

         $checkPath= "uploads/".$fetch_files["image"];

         if (file_exists($checkPath)) {
            unlink($checkPath);

            $targetPAth= "../uploads/" . $file_name;
            if(move_uploaded_file($temp_name, $targetPAth)) {

                  $update_q="UPDATE `user_task` SET image='{$file_name}' ,task_name= '{$task_name}'
                   WHERE task_id='{$task_Id}'";

                   $update_exe= $link->query($update_q);
                   if ($update_exe) {
                     echo "<div class='alert alert-success' role='alert'>
                     Task UPdate SuccessFull
                    </div>";
                    
                             header("Refresh:2,url=../" . Dashboard);
                   }
            }

         }
         else{

            $targetPAth= "../uploads/" . $file_name;
            if(move_uploaded_file($temp_name, $targetPAth)) {

                
               $update_q="UPDATE `user_task` SET image='{$file_name}' ,task_name= '{$task_name}'
               WHERE task_id='{$task_Id}'";

               $update_exe= $link->query($update_q);
               if ($update_exe) {
                 echo "<div class='alert alert-success' role='alert'>
                 Task UPdate SuccessFull
                </div>";
                
                         header("Refresh:2,url=../" . Dashboard);
               }
            }
         }
    
      }
   }
   else{

      $update_q="UPDATE `user_task` SET task_name= '{$task_name}'
      WHERE task_id='{$task_Id}'";

      $update_exe= $link->query($update_q);
      if ($update_exe) {
        echo "<div class='alert alert-success' role='alert'>
        Task UPdate SuccessFull
       </div>";
       
                header("Refresh:2,url=../" . Dashboard);
      }
   }

}


if (isset($_POST["task"]) && !empty($_POST["task"])) {

   $task_name = filterData($_POST["task_name"]);
   $user_Id = filterData($_POST["user_Id"]);
   $file = $_FILES["file"];
   pre($file);

   $allowedExtention = ["png", "jpg", "jpeg"];


   $temp_name = $file["tmp_name"];
   $file_name = $file["name"];

   $fileType = explode(".", $file_name);

   $fileExt = strtolower($fileType[1]); //PNG png

   if (!in_array($fileExt, $allowedExtention)) {
      echo "ERROR";
   }

   $targetPath = "../uploads/" . $file_name;
   // pre($fileType);
   if (move_uploaded_file($temp_name, $targetPath)) {
      $check_user_q = "INSERT INTO `user_task` (`image`,`task_name`,`user_id`)
 VALUES ('{$file_name}','{$task_name}','{$user_Id}')
  ";

      $check_user_exe = $link->query($check_user_q);

      if ($check_user_exe) {
         echo "<div class='alert alert-success' role='alert'>
 Task Added SuccessFull
</div>";

         header("Refresh:2,url=../" . Dashboard);
      }
   }

   // pending ====================================
//    $check_user_q = "INSERT INTO `user_task` (`task_name`,`user_id`)
//  VALUES ('{$task_name}','{$user_Id}')
//   ";

   //    $check_user_exe = $link->query($check_user_q);

   //    if ($check_user_exe) {
//       echo "<div class='alert alert-success' role='alert'>
//  Task Added SuccessFull
// </div>";

   //       header("Refresh:2,url=../" . Dashboard);
//    }
}


?>


<?php
require_once(dirname(__DIR__) . "/include/footer.php");
?>