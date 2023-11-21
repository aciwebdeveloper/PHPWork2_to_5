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
require_once(dirname(__FILE__) ."/App/database.php");

use App\database\Database as DB;
use App\database\helper as help;

$obj= new DB();

$obj2= new DB();

$helper= new help();

// $obj2->SelectAll("users","users.*, user_task.*","user_task.user_id=5","user_task ON users.user_id = user_task.user_id","user_task.task_id DESC");

// echo $obj2->getSql();
// $helper->pre( $obj2->getPrimaryKey("user_task"));
// LIMIT offset limit;

// $obj2->SelectAll("users","users.*,user_task.*",null,"user_task ON users.user_id = user_task.user_id",null,null);

$obj2->SelectAll("users","*");
 // $helper->pre($obj2->GetRESULT());
$column=["#","userName","email"];//table heading 

$values=["user_id","user_name","email"]; // database table field/column name

 echo $obj2->ShowResult(true,$column, $values);





$data=[
 "user_name"=>"XYZ",
 "email"=>"XYZ@gmail.com",
 "password"=>"QWER",
];

// try {
 // $obj->insert("users",$data);

// } catch (\Throwable $th) {
 //throw $th;
// }

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