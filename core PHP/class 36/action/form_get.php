<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<?php
require_once("../../helper.php");
// super global

/* 
1 post
2 get
3 server 
4 request 
5 file

*/

// echo $_POST["user_name"];
// echo $_POST["password"];
// is_null()
// isset and empty 
// isset($_POST["user_name"]);
// empty($_POST["user_name"]);

// user_name =="" || user_name !== undefined javascript
$image=$_FILES["profile"];

// echo $image["name"]; // $_FILES["profile"]["name"]
 pre($image);

 $file_extention=explode(".",$image["name"]); //PNG

$AllowExtion=["png","jpg","jpeg"];

$currentExtention=strtolower($file_extention[1]); //png string to lower

if(in_array($currentExtention,$AllowExtion) == false){
 
 echo "<div class='alert alert-danger' role='alert'>
 PNG , JPG and JPEG are ALLOWED
</div>";

 header("Refresh:2,url=../class_36.php");
}

pre($file_extention);


// uploading work 
$file_name= rand(1,99999)."_".date("d_m_y_h_i_s").$image["name"]; // step1 => filename

$temp_name=$image["tmp_name"]; // step 2 => temp name 

$targetPath="../upload/".$file_name; // jaha pr file save krni hai 



if (file_exists($targetPath) == false) {

 move_uploaded_file($temp_name,$targetPath);

}
else{
  
 echo "<div class='alert alert-danger' role='alert'>
 already exist
</div>";

}



$user_name = $_POST["user_name"];
$password = $_POST["password"];


echo " <q>hello</q>";

//   T                 T

// if (check($image)) {
 
//  echo "please Select Any Image";
//  header("Refresh:2,url=../class_36.php");
// } 


// if (check($user_name)) {
 
//  echo "please fill the User name";
//  header("Refresh:2,url=../class_36.php");
// } 

// if (check($password)) {
 
//  echo "please fill the Password";
//  header("Refresh:2,url=../class_36.php");

// }




function check($input)
{
 if ((isset($input) && !empty($input))) {
  return false;
 } else {
  return true;
 }
}




// echo "<div>{$user_name}</div> <br>";
// echo "<h1>{$password}</h1> <br>";


?>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
