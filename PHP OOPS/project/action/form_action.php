<?php 

require_once (dirname(__DIR__) ."/App/database.php");

use App\database\Database as DB;
use App\database\helper as Help;
$res=array();
?>

<?php
header('Content-type: application/json; charset=utf-8');


if(isset($_POST["insert"]) && !empty($_POST["insert"])){
$email = $_POST["email"];
$password = $_POST["password"];

$user= new DB();

$data=[
 "email"=> $email,
 "user_name"=>"default",
 "password"=> $password

];
$table="users";

 $result= $user->insert($table,$data);

$res["status"]=1;
$res["messege"]=$result;


echo json_encode($res);
}

?>
