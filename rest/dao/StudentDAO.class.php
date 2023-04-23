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
        //return $stmt->fetch(); //here, returns a single item, access it just by student.respone, a ne mora student0.response jer je jedan objekat
        return $stmt->fetchAll();

    }

    //Method used to add  students from database
    public function add($student){
       $stmt = $this->conn->prepare("INSERT INTO students (first_name, last_name) VALUES(:first_name, :last_name)");
       $stmt->execute($student);
       $student['id'] = $this->conn->lastInsertId(); //ovo nam vraca id of the last student
       return $student;                              //ovo vracamo da vidimo koga smo dodali u DB
      //da smo pored imena i prezimena, htjeli dodati jos value za statu, onda bismo to samo tako gore dodali, ali za parametar jer pise student ne treba nista vise
      //tipe sto nam je parametar student postizemo da ne trebamo pisati tacan broj parametara koji se trebaju promijeniti i pozivati ih u funkciju, vec imamo samo student kao
      //array vrijednosti i onda u ostaku koda samo napisemo nazive tih varijabli na koje zelimo utjecati
      //ovdje je redolsijed bitan jer prvi ? mijenja ime, a drugi prezime
    }

      //Method used to update students from database
      public function update($student, $id){
        $student['id'] = $id; 
        //kod add, ovo nismo morali raditi jer nismo imali ovaj treci, tj. drugi arg jer sad first i last name gledam kao jedan arg kroz $student, 
        //ali bez ovoga bi nam u ovoj metodi pokazalo error
        //mi kad napisemo $student, onda se odnosimo sa sve atribute studente, koje smo definisali u narednom koraku, ako hocemo da idemo samo
        // $stmt->execute($student);, onda id iz parametra mora postati dio ovoga $student i to je uradeno u prvoj liniji koda ove funkcije
        $stmt = $this->conn->prepare("UPDATE students SET first_name = :first_name, last_name = :last_name WHERE id = :id");
        $stmt->execute($student);
        return $student;
       //ovaj return ovdje je ono na sto ce string data upucivati iz index.php, znaci neka vrijednost ce biti spasena u data
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