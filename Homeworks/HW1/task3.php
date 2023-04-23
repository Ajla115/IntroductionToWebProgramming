<?php
//Write a PHP function to change the following array's all values to uppercase
//Initial array:


$color = array('A' => 'Blue', 'B' => 'Green', 'c' =>
'Red');


function toCapitalCase($array){
    foreach($array as $key => $value){
        $array[$key] = strtoupper($value);
    }
return $array;

}

echo "The original array looks like: <br>";
print_r($color);
echo "The array after implementing function looks like: <br>";
print_r(toCapitalCase($color));









?>
