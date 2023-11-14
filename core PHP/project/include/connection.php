<?php


define("Server", "localhost");
define("UserName", "root");
define("Password", "");
define("D_B", "lms");

// $conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$conn = new mysqli(Server, UserName, Password, D_B);
if ($conn) {

 // echo "connection established";

}

// $abc="\\hello\\";
//\hello\
// $data = mysqli_real_escape_string($conn,$data);

function filterData($data)
{
 global $conn;
 $data = $conn->real_escape_string($data);
 $data = trim($data);
 $data = stripslashes($data);
 return $data;
}


function checkGet($input)
{
 if (isset($_GET[$input]) && !empty($_GET[$input])) {

  return true;
 } else {
  return false;
 }


}

function checkPOST($input)
{
 if (isset($_POST[$input]) && !empty($_POST[$input])) {

  return true;
 } else {
  return false;
 }


}


?>