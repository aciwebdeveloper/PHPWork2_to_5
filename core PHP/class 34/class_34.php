<?php



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

// pre    (2);

// array_push($array_1,"sndaklndalk");
// array_unshift($array_1,"New element");
// array_pop($array_1);
// array_pop($array_1);
// array_pop($array_1);

// array_shift($array_1);
// array_shift($array_1);

// $array_3=array_slice($array_1,1,3);
// echo "<h3>Original Array</h3>";

// pre($array_1);

// $array_3= array_splice($array_1,3,0,[123,0,0,0]);

// echo "<h3>splice Array</h3>";

// pre($array_1);

$array_1 = [425, 432543, 432324, 321432, 321543];

$array_2 = array(432, 432, 432, 432, 432);


// echo "<h3>Original Array</h3>";

// pre($array_1);

// $array4= array_merge($array_1, $array_2);
// $array4= array_combine($array_1, $array_2);

// $array4 = array_flip($array_1);
// echo "<h3>Flip Array</h3>";

// pre($array4);

// $array4 = array_reverse($array_1);
// echo "<h3>Reverse Array</h3>";

// pre($array4);


// $array_4=array_values($array_1);
// $array_4=array_keys($array_1);

// pre($array_4);

// pre($array_1);

// echo $array_1[5];

// $lenght=count($array_1);



// echo $lenght;
?>

