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



$array = [213, 543, 65, 876, 543, 324, 432];

$length = count($array);

$range = $length - 1;


// for ($index=0; $index < $length ; $index++) { 

// echo $array[$index]."<br>";

// }



// foreach ($array as $key => $value) {
//  echo $key . " :" . $value . "<br>";
// }

$array = [
 "Name" => "XYZ",
 "Number" => 13432432432
];
$array = [];
//  $i the number that we will use to increament

// $a  where we want to start (starting point )

// display(3, 1, 10);
function display($i, $a, $end)
{
 global $array;

 $start = $a; // 3

 // $end = 10
//    3       10
 if ($start <= $end) {

  // postfix , prefix
 // $i = 4
  $i++; //6
  $start++; //4

  // echo $i."<br>";
  array_push($array, $i);

  display($i, $start, $end);

 } else {

 }


}

display(3, 1, 20);

pre($array);
// do {


// } while ($a <= 10);

// while ($array) {
//  echo "ok";
// }
// $i=0;
// while ($i < $length) {
//  echo $i.":".$array[$i]."<br>";

//  $i++;
//  }



