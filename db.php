<?php
$servername = 'WebProgramming';
$username = 'root';
$password = 'a1b2c3d4e5';
$scheme = 'rentacar';

try {
    $conn = new PDO("WebProgramming=$servername; dbname = $schema", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully \n";

    $stmt = $conn->prepare("SELECT * FROM cutomers");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO:FETCH_ASSOC);
    print_r($result);

}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

//ovo je try and catch u slucaju da connection ne uspije, pa da dobijemo odgovor





?>