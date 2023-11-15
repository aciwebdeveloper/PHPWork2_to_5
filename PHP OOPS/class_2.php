<?php 
/*




*/
// 2. ABSTRACTION 
abstract class vehical{
abstract protected function engine();

protected  $abc;
public function __construct(){

}
// abstract public function method_2();

}

// class bike extends vehical{
//   public function engine(){

//   }
// }

// class cycle extends bike{
//   public function engine(){
//    echo "";
//   }
// }

// class car extends vehical {
//  public function engine(){

//  }
//  public function method_2(){

//  }

// }


// =========================================3. INTERFACES====================

// interface interface_1{
// // public $abc;

// public function display();

// }

// interface interface_2{
//  // public $abc;
 
//  public function show();
 
//  }

// class ABC implements interface_1, interface_2{
//  public function display(){}
//  public function show(){}
// }
// ========================1. STATIC CLASS , PROPERTIES AND METHOD===============================

class ABC{
static public $abc;
// public $qwer;
}

class RTY extends ABC{
static public $abc2;
public function display(){

 return self::$abc2 = 67;
 
}

}

$obj= new RTY();

echo $obj->display();
// ABC::$abc=98;
// echo ABC::$abc;


?>