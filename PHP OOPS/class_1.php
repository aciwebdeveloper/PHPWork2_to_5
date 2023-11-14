<!-- ENCAPSULATION -->
<!-- 
1. Association 
2. aggregration
3. composition

 -->
<?php

class BASE 
{

public function __construct(){
 echo "this is base class constructor";
}


 // rule 1 variable should in private 
 // private $name;
 // private $number;

 protected $name;
 protected $number;
 // rule 2 setter function

 public function __destruct(){
  echo "<br>__destructor function of BASE  is called";
 }

}

class Derived  extends BASE{
 

// default constructor
 public function __construct(){
  
  // parent::__construct();

  $this->name = "default";
  $this->number = 0;
  echo "this is derived class constructor<br>";
 }
 
 
 public function SetName($n=null)
 {
  $this->name = $n;
 }
 public function SetNumber($a=null)
 {
  $this->number = $a;
 }

 // getter function with return 
public function GetName(){
 return $this->name;
}
public function GetNumber(){
 return $this->number;
}


public function __destruct(){
echo "<br>__destructor function of derived  is called";
}

}

$obj=new Derived(); // object 


// $obj->SetName("XYZ");
// $obj->SetNumber(1234343543);

echo $obj->GetName()."<br>";
echo $obj->GetNumber();

// echo $qwer->_abc;
// $obj=new BASE();

// $obj->SetName("XYZ");
// $obj->SetNumber(1234343543);

// echo $obj->GetName()."<br>";
// echo $obj->GetNumber();

?>