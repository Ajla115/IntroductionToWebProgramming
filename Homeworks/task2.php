<?php 

//output of the initial array
/*array(4) { ["Sarajevo"]=> int(71000) ["Mostar"]=>
int(88000) ["Tuzla"]=> int(75000) ["Zenica"]=> int(72000) }*/

$arr1 = array("Sarajevo"=>71000, "Mostar"=>"88000", "Tuzla"=>"75000", "Zenica"=>72000);
var_dump($arr1);

//this is teh expected output
/*array(4) { ["Sarajevo"]=> string(7) "capital" ["Mostar"]=>
int(88000) ["Tuzla"]=> int(75000) ["Banja Luka"]=>
int(78000) }*/

$arr1["Sarajevo"] = "capital";
unset($arr1["Zenica"]);
$arr1["Banja Luka"] = 78000;


echo "Final array is: <br>";
var_dump($arr1);














?>