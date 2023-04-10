<?php


require_once("rest/dao/StudentDAO.class.php");

$student_dao = new StudentDao();

$results = $student_dao->get_all();
var_dump($results);

// echo "hi";
// 127.0.0.1
/*$servername = 'localhost';
$username = 'root';
$password = 'a1b2c3d4e5';
$schema = 'weblectures';

try {
    $conn = new PDO("mysql:host=$servername;dbname = $schema", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully \n";

    $stmt = $conn->prepare("SELECT * FROM students");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}*/

//ovo je try and catch u slucaju da connection ne uspije, pa da dobijemo odgovor





?>