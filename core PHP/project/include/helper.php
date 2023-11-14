<?php
$link;
// core php

function connectionMySQl(){
global $link;

define("server","localhost");
define("User_name","root");
define("password","");
define("DB","abc01");

// const $host='dsadsa';
// $link=mysqli_connect(server,User_name,password,DB); this method is used in core php

$link= new mysqli(server, User_name,password ,DB);

if($link){
 // echo "connection established";
}
}


function filterData($data){
 global $link;
$data = $link->real_escape_string($data);
$data = trim($data);
$data= stripslashes($data);
return $data;
}

function pre($a)
{
 if (is_array($a)) {

  echo "<pre>";
  print_r($a);
  echo "</pre>";

 } else {
  echo $a;
 }

}

?>

