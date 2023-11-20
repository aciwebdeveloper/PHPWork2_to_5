<?php 


class qwerew{
public $qwert=90;

}

$iop=new qwerew();
echo $iop->qwert;

class abc{

// access modifier 
/*
1. public
2. private
3. protected
*/
// public $_abc;
private $_abc=57;

public function display(){

 echo $this->_abc;

}

}
// $link = new mysqli();
$qwer= new abc(); // object 


$qwer->display();

// this variable will be set if our variable is in public 
// $qwer->_abc=56;

// echo $qwer->_abc;
?>