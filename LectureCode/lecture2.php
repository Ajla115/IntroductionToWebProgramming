<?php

echo "My first PHP script <br>";

// single line comment
#  single line comment
/*
This is a multiple-lines comment.
*/

$a = 5 + 15 + 5;
echo $a;


$txt = "WW3School.tutorial ";
echo "I love " . $txt . "videos!\n";


$x = 5;
$y = 4;
echo $x + $y . "\n";


$b = 5; //global scope
/*function myTest(){
    echo "Variable b inside function is $b.";
}

myTest();*/
/*this function is commented and can not run because 
the variable defined in it is from global scope, and not local*/

echo"Variable b outside function is: $b\n";

function myTest2(){
    $x = 10;
    echo "Variable x inside function is $x.\n";
}
myTest2();
//this value x from inside of the function myTest2() would cause an error, 
//if we called it in an echo function outside that myTest2()

$t = 15;
$k = 10;

function myTest3(){
    global $t, $k; //global is used when we want to call variables from inside of the function, outside in the main
    $k = $t + $k;
    echo $k . "\n";
}

myTest3();


//static variables are used when we want to keep the variable and its value even after the execution, it does not get deleted

function myTest4(){
    static $x = 0;
    echo $x  . "\n";
    $x++;
}

myTest4();
myTest4();
myTest4();

//echo does not have return value and it takes multiple args
//print has a return value but only takes one arg

$txt1 = "Learn PHP ";
$txt2 = "W3Schools.com";
$r = 5;
$t = 4;

print $txt1 . "\n";
print "Study PHP at " . $txt2 . "\n";
print $r + $t. "\n";

echo $txt1 . "\n";
echo "Study PHP at " . $txt2 . "\n";
echo $r + $t . "\n";

//var_dump returns teh data type and value
$x = 5985;
var_dump($x);

//two types of the arrays
//this is indexed array
$cars = array("Volvo", "Audi", "BMW", "Kia");
echo "My favourite type of car is " . $cars[0] . ", but I also like " . $cars[1] . " and " . $cars[2] . ".\n";

//second type of an array
//this is associative
$age = array("Peter" => "35", "Maria" => "46", "Ben" => "10");
echo "Peter is " . $age["Peter"] . " years old.\n";
var_dump($age);

//foreach is used only for arrays
foreach($age as $x => $val){
    echo "$x = $val\n";
}

//there is a second type of foreach used with the second type of array
//here, we only have values, and not keys and values
$colors = array("red", "green", "blue", "yellow");
foreach($colors as $value){
    echo "$value\n";
}

//third type of the array is multidimensional
$carBrands = array(
    array("Volvo", "22","18"),
    array("BMW", "45", "67"),
    array("Land Rover", "23", "34"));


echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".\n";
echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".\n";
echo $cars[2][0]. ": In stock: " . $cars[2][1] . ", sold: " . $cars[2][2] . ".\n";

//OOP principle in PHP
class Car{
    public $color;
    public $model;

    public function __construct($color, $model){
        $this->color = $color;
        $this->model = $model;
    }
    public function message(){
        return "My car is a " . $this->color . " " . $this->model . "!\n";
    }
    }

    $myCar = new Car("black", "Volvo");
    echo $myCar -> message();
    $myCar2 = new Car("red", "Kia");
    echo $myCar2 -> message();

    $j = "Hello World";
    $j = null; //this is how you declare a variable to have a NULL value
    var_dump($j);

    //strlen() - returns the length of the string
    echo strlen("Hello world!");
    echo("\n");

    //str_word_count() - counts words in the string
    echo str_word_count("Hello world!"); //output will be 2
    echo("\n");

    //strrev() - reverses a string
    echo strrev("Hello world!");
    echo("\n");

    //strpos() - search for a text within a string
    echo strpos("Hello world", "world"); //prints 6 as starting position of world
    echo("\n");

    //str_replace -replaces text within a string
    echo str_replace("world", "Dolly", "Hello world!");
    echo("\n");

    $d = 115;
    var_dump(is_int($d));
    //is_int() == is_integer() == is_long() -> all do the same, which is checking if smhm is an integer

    //constants are defined like define(name, values, case-insensitive - here, default is false)
    define("GREETINGS", "Welcome to W3Schools.com!\n");
    echo GREETINGS; //with constants, there is no need to put $ in front

    //== -> this is equal, when two variables have the same value
    //=== -> this is identical, when they have the same value and are of the same type

    //++$x -> this is first increment, and then return
    //$x++ -> this is first return, and then increment

    //$txt1 . $txt2 is concatination
    //$txt1 .= $txt2 is appending

    //conditional statements
    $t = date("H");
    if($t < "10"){
        echo "Have a good morning!\n";
    } else if($t < "20") {
        echo "Have a good day.\n";
    } else {
        echo "Have a good night!\n";
    }

    //switch case
    $favcolor = "red";
    switch($favcolor){
    case "red":
        echo "Your favourite color is red!\n";  
        break;
    case "blue":
        echo "Your favourite color is blue!\n";  
        break;
    case "green":
        echo "Your favourite color is green!\n";  
        break;
        default:
        echo "Your favourite color is neither red, blue nor green!\n";
    }

    $s = 0;
    while($s <= 100){
        echo "The number is: $s.\n";
        $s+=10;
    }

    for($x = 0; $x <= 10; $x++){
        echo "The number is: " . $x . ".\n";
    }

    function familyName($fname, $year){
        echo  "$fname Refsnes. Born in $year.\n";
    }

    familyName("Hege", "1975");
    familyName("Stale", "1978");
    familyName("Kai Jim", "1983");

    /*Some predefined variables in PHP are "superglobals", which means that they are always accessible, regardless of
      scope - and you can access them from any function, class or file without having to do anything special.*/

    //$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.
      /*echo $_SERVER['PHP_SELF'];
      echo "\n";
      echo $_SERVER['SERVER_NAME'];
      echo "\n";
      echo $_SERVER['HTTP_HOST'];
      echo "\n";
      echo $_SERVER['HTTP_REFERER'];
      echo "\n";
      echo $_SERVER['HTTP_USER_AGENT'];
      echo "\n";
      echo $_SERVER['SCRIPT_NAME'];
      echo "\n";*/
      //At the moment, here is undefines array key, that is why it is showing an error.

      //PHP $_REQUEST is a PHP super global variable which is used to collect data after submitting an HTML form.











?>