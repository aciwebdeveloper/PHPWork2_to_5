<?php
// namespace
namespace samplePHP;
// __autoload("");
// spl_autoload_register(function ($class) {

// }

// Trait 
// class ASDF{
//  public function SHOW(){
//   echo "FROM ASDF class";
//  }
// }

trait trait1
{

 public function SHOW()
 {
  echo "from trait1";
 }


}

trait trait2{
 public function SHOW()
 {
  echo "from trait2";
 }
}
class QWER 
{

 use trait1,trait2{

  trait2::SHOW insteadof trait1;

  trait1::SHOW as abc;
 }

 

}

$obj = new QWER();
$obj->SHOW();
$obj->abc();


?>