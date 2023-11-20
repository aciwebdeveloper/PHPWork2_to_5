<?php

namespace includes\database;


class Database
{
 // encapsulation rules
 private $db = "PHP_OOPS_CRUD";
 private $username = "root";
 private $password = "";
 private $server = "localhost";
 protected $link;

 private $query;
 private $exe;
 private $result;



 public function __construct()
 {
  $this->link = new \mysqli($this->server, $this->username, $this->password, $this->db);

  if ($this->link) {
   // echo "Established";
  }
 }



 public function GetRESULT(){
  $this->result= $this->exe->fetch_assoc();
  return $this->result;
 }

 public function SelectAll($table, $columns="*",$where=null,$join=null,$orderBY="DESC",$limit=null){
 // SELECT * FROM `user`
 // SELECT column_name FROM `user`
 // SELECT column_name FROM `user` WHERE 
 // SELECT column_name FROM `user` JOIN  WHERE 
 // SELECT column_name FROM `user`   WHERE  ORDERBY
 // SELECT column_name FROM `user`   WHERE  LIMIT 
 
 $this->query = "SELECT {$columns} FROM `{$table}`";

 if($where != null){
  $this->query .=" WHERE {$where}";
 }
 if($join != null){
  $this->query .= " JOIN {$join}";
 }

 if($orderBY != "DESC"){
  $this->query .= " ORDER BY {$orderBY}";
 }else{
  $this->query .= " ORDER BY id DESC";
 }

 if($limit != null){
  $this->query .= " LIMIT {$limit}";
 }




 if( $this->execute($this->query,null)){
  return true;

 }else{
  return false;
 }

}
 


 // method 1 sample 
// public function insert($table,$col, $val ){

 // // INSERT INTO table_name (columns) VALUES (values)
// }


 public function insert($table, $param)
 {

  // [
  //  "col"=>"value"
  // ];
  $column = implode("`,`", array_keys($param));

  $values = implode("','", array_values($param));
  // echo $column."<br>";
// echo $values."<br>";

if ($this->checkTable($table)) {

  $this->query = " INSERT INTO `{$table}` (`{$column}`) 
  VALUES ('{$values}')";
 
 $this->execute($this->query,"DATA HAS BEEN INSERTED") ;
 

}else{
$abc= new helper();

$abc->ErrorMSG("TABLE IS NOT EXIST");

}

//   $this->query = " INSERT INTO `{$table}` `{$column}` 
// VALUES '{$values}'";

  // INSERT INTO table_name (columns) VALUES (values)

 }


 private function checkTable($table)
 {
 $this->query = "SELECT * 
FROM information_schema.tables
WHERE table_schema = '{$this->db}'
    AND table_name = '{$table}'
LIMIT 1;";

  $this->exe = $this->link->query($this->query);

  if ($this->exe) {

   if ($this->exe->num_rows == 1) {
    return true;
   }
   else{
    return false;
   }
  }

 }


private function execute($query,$msg){
echo $query;

 $this->exe = $this->link->query($query);
//  Association 
 $helper= new helper();

  if ($this->exe) {

   if ($msg != null) {
    $helper->SuccessMSG($msg);
   }else{
    return true;
   }

    
   
 }
 else{

  $helper->ErrorMSG("ERROR in QUERY: ".$this->query);
 }

}
}


class helper extends Database
{

 // private $obj=new Database();

 public function pre($input)
 {
  if (is_array($input)) {
   echo "<pre>";
   print_r($input);
   echo "</pre>";
  } else {
   echo $input;
  }
 }


 public function redirectURL($url)
 {

  header("Location:" . $url);

 }


 public function RefreshURL($second = 2, $url)
 {
  // header("Refresh:2,url=home.php");

  header("Refresh:" . $second . ",url=" . $url);
 }

 public function SuccessMSG($msg)
 {
  echo "<div class='alert alert-success' role='alert'>
    {$msg}
  </div>";

 }
 public function ErrorMSG($msg)
 {
  echo "<div class='alert alert-danger' role='alert'>
     {$msg}
   </div>";

 }
 public function FilterData($input)
 {

  $input = $this->link->real_escape_string($input);
  $input = trim($input);
  $input = stripslashes($input);

  return $input;


  // "\\hello\\"; // \hello\
  // $input=mysqli_real_escape_string($link, $input);
 }






}

?>