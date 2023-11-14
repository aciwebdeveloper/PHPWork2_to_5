<?php
require_once(dirname(__FILE__) . "/include/header.php");
// echo dirname(__FILE__) root path
?>

<?php
// http://localhost/batch_2_to_5/project/form_delete.php?success=true
if (checkPOST("delete") && checkGet("success")) {

 $user_id = $_POST["user_id"];

 $S_user_data = "DELETE FROM `users` WHERE user_id='{$user_id}'";

 $exe_user_data = $conn->query($S_user_data);

 if ($exe_user_data) {
  echo "DATA HAS BEEN DELETED";
  header("Refresh:2,url=".HOME);
 }

} else {


}

if (checkGet("id")) {
 # code...

 $user_id = $_GET["id"];

 // $S_user_data="DELETE FROM `users` WHERE user_id='{$user_id}'";

 // $exe_user_data=$conn->query($S_user_data);


 // http://localhost/batch_2_to_5/project/form_update.php?id=1
} else {
 // header("Location:form.php");
}
// http://localhost/batch_2_to_5/project/form_delete.php?success=true

?>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
 tabindex="-1">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">

    <form action="./form_delete.php?success=true" method="POST">
     
     <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

     <input type="submit" name="delete" value="YES">

    </form>

   </div>
   <div class="modal-footer">
    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second
     modal</button>
   </div>
  </div>
 </div>
</div>


<?php
require_once(dirname(__FILE__) . "/include/footer.php");
// echo dirname(__FILE__) root path
?>
<?php

if (checkPOST("delete")) {


} else {
 ?>
 <script>
  const myModal = new bootstrap.Modal('#exampleModalToggle'); // bootstrap call 

  const modalToggle = document.querySelector('#exampleModalToggle'); // own modal selector


  myModal.show(modalToggle); //show our modal
 </script>

<?php } ?>