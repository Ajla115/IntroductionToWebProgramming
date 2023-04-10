<?php
class StudentDao{
    private $conn;

    //Class constructor used to establish connection
    public function __construct(){
        try{
        $servername = 'localhost';
        $username = 'root';
        $password = 'a1b2c3d4e5';
        $schema = 'weblectures';

        $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    //set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully 222\n";
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
    //Method used to get all students from database
    public function get_all(){
        $stmt = $this->conn->prepare("SELECT * FROM students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
//Method used to get all students from database by id
    public function get_by_id($id){
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute(['id' => $id]);
        //return $stmt->fetchAll(PDO::FETCH_ASSOC); //returns you an array with one element, to access it, you would have to go student0.id
        return $stmt->fetch(); //here, returns a single item, access it just by student.respone, a ne mora student0.response jer je jedan objekat

    }

    //Method used to add  students from database
    public function add($first_name, $last_name){
        $stmt = $this->conn->prepare("INSERT INTO students (first_name, last_name) VALUES(?, ?)");
       $result = $stmt->execute([$first_name, $last_name]);
       return $result;
       //ovdje je redolsijed bitan jer prvi ? mijenja ime, a drugi prezime
    }

      //Method used to update students from database
      public function update($first_name, $last_name, $id){
        $stmt = $this->conn->prepare("UPDATE students SET first_name = :first_name, last_name = :last_name WHERE id = :id");
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'id' => $id]);
        //ovdje u execute npr redoslijed nije bitan, jer su vezani preko naming, a ne position
    }

    
      //Method used to delete students from database
      public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id); //to prevent SQL injection, which is a security issue
        $stmt->execute();
    }
    //with binding parametar, kad napisemo where id = 12 OR 1=1, ovo 1=1 ce zanemariti i nece obrisati sve podatke


}























?>