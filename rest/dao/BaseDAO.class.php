<?php
require_once __DIR__."/../Config.class.php";
class BaseDao{

    private $conn;
    private $table_name;

    //Class constructor used to establish connection to the db
    public function __construct($table_name){
        try{
        $this->table_name = $table_name; //ovaj dio je sad novi, initializacija parametra
        $servername = Config::DB_HOST();
        $username = Config::DB_USERNAME();
        $password = Config::DB_PASSWORD();
        $schema = Config::DB_SCHEMA();;
       
        $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    //set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully 222\n";
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

     //Method used to get all entities from database
     public function get_all(){
        $stmt = $this->conn->prepare("SELECT * FROM  " . $this->table_name); //ovaj space ovdje kod FROM je prebitan!!!!
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    //Method to get entries from the table based upon a id which is given as a parameter
    public function get_by_id($id){
        $stmt = $this->conn->prepare("SELECT * FROM  " . $this->table_name . "  WHERE id = :id"); //treba prostor i prije i poslije querija!!!
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();

    }
     //Method used to delete entity from database
     public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM  " . $this->table_name . " WHERE id = :id");
        $stmt->bindParam(':id', $id); //to prevent SQL injection, which is a security issue
        $stmt->execute();
    }

      //Method used to add a column in the database
      public function add($entity){
        $query = "INSERT INTO " . $this->table_name . " (";
        foreach($entity as $column => $value){
            $query.= $column . ', '; //.= je za appending
        } 
        //preko for loopa, dobit cemo ovaj izgled kao sto je dolje

        /* first_name : "Test1",
           last_name : "Test2"
           -ovaj zadnji nema zareza na kraju, vec se samo zatvore zagrade, pa zato se radi tu substring da se rijesi toga*/

        $query = substr($query, 0, -2);
        $query.= ") VALUES (";
        foreach($entity as $column => $value){
            $query.= ":" . $column . ', '; //ovo : je ono binding parameters
            //da ne treba ovdje mozda value, umjesto opet column
        }
        $query = substr($query, 0, -2);
        $query.= ")";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($entity);
        $entity['id'] = $this->conn->lastInsertId(); //ovo nam vraca id of the last student
        return $entity;  
}


    /* Method used to update entity in database*/
    public function update($entity, $id, $id_column = "id"){ //ovo id je samo status column, dok id_column je default column kao id
        $query = "UPDATE " . $this->table_name . " SET ";
        foreach($entity as $column => $value){
            $query.= $column . "=:" . $column . ", ";
        }
        $query = substr($query, 0, -2);
        $query.= " WHERE ${id_column} = :id";
        $stmt = $this->conn->prepare($query);
        $entity['id'] = $id;
        $stmt->execute($entity);
        return $entity;
    }



}


?>