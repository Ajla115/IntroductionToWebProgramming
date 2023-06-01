<?php
/*Write your own PHP functions to calculate and display average, lowest and
highest temperatures.
Recorded temperatures: 78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73,
68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73*/


$array = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
$max = max($array);
$min = min($array);
echo "The biggest value in this array is " . $max . " and the smallest is " . $min . ".<br>";

//The second way is 

$arr2 = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$sum = 0;
$count = 0;
foreach($arr2 as $value){
    $sum += $value;
    $count++;
}
$average = $sum / $count; //calculating the average value 
echo "The average number of this array is " . $average . ".<br>";

$min = 100;  //calculating the smallest value in the array
foreach($arr2 as $value){
   if($value < $min){
    $min = $value;
   }
}
echo "The smallest number of this array is " . $min . ".<br>";



$max= 0;  //calculating the maximum value in the array
foreach($arr2 as $value){
   if($value > $max){
    $max = $value;
   }
}
echo "The biggest number of this array is " . $max . ".<br>";










?>