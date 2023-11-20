<?php 
require_once(dirname(__FILE__) ."/include/database.php");

use includes\database\Database as DB;
use includes\database\helper as help;

$obj= new DB();
$helper= new help();

if ($obj->SelectAll("users","*","id=2")) {

while($row=$obj->GetRESULT()){
$helper->pre($row);
}

}

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