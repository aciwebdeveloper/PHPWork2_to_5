<?php

namespace App\database;


class Database
{
  // encapsulation rules
  private $db = "auth";
  private $username = "root";
  private $password = "";
  private $server = "localhost";
  protected $link; // DATABASE LINKAGE 

  private $query; // MYSQL query 
  private $exe; // Query EXECUTION SAVE 
  private $result; // FETCH ASSOC 



  public function __construct()
  {
    $this->link = new \mysqli($this->server, $this->username, $this->password, $this->db);

    if ($this->link) {
      // echo "Established";
    }
  }





  // method 1 sample 
// public function insert($table,$col, $val ){

  // // INSERT INTO table_name (columns) VALUES (values)
// }

  /* 
  $table is used for table name
  $param is used for saving Associative array
  */
  public function insert($table, $param)
  {

    //  implode is used for converting array to string while explode is used for converting string to array
    $column = implode("`,`", array_keys($param));

    $values = implode("','", array_values($param));
    // echo $column."<br>";
// echo $values."<br>";

    if ($this->checkTable($table)) {

      $this->query = " INSERT INTO `{$table}` (`{$column}`) 
  VALUES ('{$values}')";

    return $this->execute($this->query, "DATA HAS BEEN INSERTED");


    } else {
      $abc = new helper();

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
      } else {
        return false;
      }
    }

  }


  private function execute($query, $msg = null)
  {

    //  $query."from execute function";
    $this->exe = $this->link->query($query);
    //  Association 
    $helper = new helper();

    if ($this->exe) {

      if ($msg != null) {

      return $helper->SuccessMSG($msg);

      } else {
        return true;
      }



    } else {

      $helper->ErrorMSG("ERROR in QUERY: " . $this->query);
    }

  }


  public function GetRESULT()
  {
    $this->result = $this->exe->fetch_assoc();
    return $this->result;
  }

  public function getSql()
  {
    return $this->query;
  }

  public function getPrimaryKey($table)
  {

    $query = "SELECT k.COLUMN_NAME
  FROM information_schema.table_constraints t
  LEFT JOIN information_schema.key_column_usage k
  USING(constraint_name,table_schema,table_name)
  WHERE t.constraint_type='PRIMARY KEY'
      AND t.table_schema=DATABASE()
      AND t.table_name='{$table}';";

    $this->exe = $this->link->query($query);
    if ($this->exe) {

      return $this->exe->fetch_assoc();

    }

  }

  public function SelectAll($table, $columns = "*", $where = null, $join = null, $orderBY = null, $limit = null)
  {
    // SELECT * FROM `user`
    // SELECT column_name FROM `user`
    // SELECT column_name FROM `user` WHERE 
    // SELECT column_name FROM `user` JOIN  WHERE 
    // SELECT column_name FROM `user`   WHERE  ORDERBY
    // SELECT column_name FROM `user`   WHERE  LIMIT 
    $primaryKey = $this->getPrimaryKey($table);
    // print_r($primaryKey);

    $this->query = "SELECT {$columns} FROM `{$table}`";

    if ($join != null) {
      $this->query .= " JOIN {$join}";
    }

    if ($where != null) {
      $this->query .= " WHERE {$where}";
    }



    if ($orderBY != null) {
      $this->query .= " ORDER BY {$orderBY}";
    } else {
      // echo "dsaklkldsa";


      $this->query .= " ORDER BY {$table}.{$primaryKey["COLUMN_NAME"]} DESC";
    }

    if ($limit != null) {
      $this->query .= " LIMIT {$limit}";
    }

    if ($this->execute($this->query, null)) {
      return true;

    } else {
      return false;
    }

  }


  public function DELETE_DATA($table,$WHERE=null){

    $this->query="DELETE FROM `{$table}`";
    if ($WHERE != null) {
      $this->query.= " WHERE {$WHERE}";
    }

    $this->execute($this->query, "DATA HAS BEEN DELETED");

  }

public function updateDATA($table, $param, $WHERE=null){

  // UPDATE table_name SET `column_name`=value , WHERE id = 
$this->query="UPDATE `{$table}` SET ";

$a="";
foreach ($param as $key => $value) {

  $a .= " `{$key}` = '{$value}' ,";

}

 $this->query .= rtrim($a,",");


if ($WHERE != null) {
    $this->query .= "WHERE {$WHERE}";
}

$this->execute($this->query, "DATA HAS BEEN UPDATED");

}


  public function ShowResult($check = true, $col, $data)
  {

    if ($check) {

      $html = "<div class='table-responsive'>";

      $html .= "<table class='table table-dark table-hover'>";
      // headings
      $html .= "<tr>";
      foreach ($col as $value) {
        $html .= "<th>{$value} </th>";
      }
      $html .= "</tr>";
      // heading end

      // database fetching rows

      while ($row = $this->GetRESULT()) {
        $html .= "<tr>";

        foreach ($data as $values) {
          $html .= "<td>{$row[$values]}</td>";
        }

        $html .= "</tr>";

      }


      $html .= "
    </table>
    </div>";

      return $html;

    }else{
    
      $helper = new helper();

      while ($abc=$this->GetRESULT()) {
        $helper->pre($abc);
      }
    
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
    return "<div class='alert alert-success' role='alert'>
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