<?php

require_once("rest/dao/StudentDAO.class.php");

$student_dao = new StudentDao();
$first_name=$_REQUEST['first_name'];
$last_name=$_REQUEST['last_name'];
$results = $student_dao->add($first_name, $last_name);
print_r($results);




/*$servername = 'WebProgramming';
$username = 'root';
$password = 'a1b2c3d4e5';
$schema = 'weblectures';

try {
    $conn = new PDO("mysql:host=$servername;dbname = $schema", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully \n";

    print_r($_REQUEST); //ovo je zbog dinamicnog unosenja preko URLa
    $first_name=$_REQUEST['first_name'];
    $last_name=$_REQUEST['last_name']; //ovo je kad preko URL unesemo da se odmah doda arrayu prethodnih vrijednosti
    
    
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name) VALUES('$first_name', '$last_name')");
    $result =  $stmt->execute();
    print_r($result);

}

catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}*/



?>