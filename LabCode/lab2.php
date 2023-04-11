<?php


//arrray creation

//first way is with keyword
$firstarray = array("foo"=>"bar", "bar"=>"foo");

//second way is with square brackets
$secondarray  = ["foo"=>"bar", "bar"=>"foo"];

foreach($firstarray as $key => $val ){
    echo $key.  " => " . $val . "\n"
; }



//for keys only strings and integers can be used
//for values, anything included data type for keys can also be used
//objects can be values as well
//if multiple elements have the same key, the last element will overwrite all the previous ones


$array = array(1 => "a",
               "1" => "b",
               1.5 => "c",
               true => "d"
            );
var_dump($array);

$array2 = array(
    1 => 'a',
    '1' => 'b',
    1.5 => 'c',
    -1 => 'd',
    '01' => 'e',
    '1.5' => 'f',
    true => 'g',
    false => 'h',
    '' => 'i',
    null => 'j',
    'k', //usually it is not a practice to combine array elements that have keys and values, and single elements
    2 => 'l',

);

var_dump($array2);



//from the example above, you can conclude that mixed keys is a possible option
//but just because it is, does not mean you should use it

$array3 = array("foo"=>"bar", "bar" =>"foo", 100 => -100, -100 =>100 );
var_dump($array3);



$array4 = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
 );
 
 var_dump($array4["foo"]);
 echo "<br>";
 var_dump($array4[42]);
 echo "<br>";
 var_dump($array4["multi"]["dimensional"]["array"]);
 echo "<br>";

 //you can also access associative array values by index by using a function array_values()
 $array4 = array_values($array4);
 var_dump($array4[0]);
 var_dump($array4[1]);
 var_dump($array4[2]["dimensional"]["array"]);
 //this one, for some reason ouputs three NULLs

 //expansion of the array
 //string key
 $arr1 = ["a" => 1];
 $arr2 = ["a" => 2];
 $arr3 = ["a" => 0, ...$arr1, ...$arr2];
 //here, it will be only one element because keys are the same, so values are overwritten one another
 //it will be key a and value 2
 var_dump($arr3);

 //integer key
 $arr4 = [1,2,3];
 $arr5 = [4,5,6];
 $arr6 = [...$arr4, ...$arr5];
 //here, there is no keys, but only values and the result will be 1,2,3,4,5,6
 var_dump($arr6);


 //To change a certain value, assign a new value to that element using its key
//To remove the key/value pair, juts call the unset function

$arr7 = array(5=>1, 12 =>2);
$arr[] = 56; // This is the same as $arr[13] = 56;
// at this point of the script
$arr["x"] = 42; // This adds a new element to
// the array with key "x"
$arr["x"] = 100; // This changes the value
// of the element with key "x"
unset($arr[5]); // This removes the element from the array
unset($arr); // This deletes the whole array


//for arrays, the traversal which is used is foreach loop

$colors = array('red', 'blue', 'green', 'yellow');
foreach($colors as $color){
    echo "Do you like this $color? <br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($age as $key => $value){
    echo "Key is " . $key . ", Value= " . $value . "<br>";
}

$source_array = [
    [1, 'John'], [2, 'Jane'],
];

foreach($source_array as [$id, $name]){
    echo "Id= " . $id . ", Name= " . $name;
    echo "<br>";
}

/*Array sorting
● sort() - sort arrays in ascending order
● rsort() - sort arrays in descending order
● asort() - sort associative arrays in ascending order, according to the value
● ksort() - sort associative arrays in ascending order, according to the key
● arsort() - sort associative arrays in descending order, according to the value
● krsort() - sort associative arrays in descending order, according to the key*/


//Usage of superglobal variables
$x = 75;
$y = 25;
function addition2() {
$GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
addition2();
echo "z = ", $z;


echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];

//$_REQUEST is a PHP super global variable which is used to collect data after
//submitting an HTML form.

/*<html>
<body>
<form method="post">
Name: <input type="text" name="fname">
<input type="submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_REQUEST['fname'];
if (empty($name)) {
echo "Name is empty";
} else {
echo $name;
}
}
?>
</body>
</html>
*/

//$_GET request is used to access data sent as parameters through URL
echo $_GET['name'];
echo "<br>";
echo $_GET['age'];
?>
