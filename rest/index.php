<?php

require "../vendor/autoload.php";
require "dao/StudentDAO.class.php";


Flight::route("/", function(){
    echo "Hello from the / route.";
});

Flight::route("GET /students/@id", function($id){
    //echo "Hello from / students route";
    $student_dao = new StudentDao();
    $results = $student_dao->get_by_id($id);
    //print_r($results);
    Flight::json($results); //-> converts the results to the JSON form
});

Flight::route("DELETE /students/@id", function($id){
    //echo "Hello from / students route";
    $student_dao = new StudentDao();
    $results = $student_dao->delete($id);
    //print_r($results);
    Flight::json(['message' => "Student deleted successfully."]); //-> converts the results to the JSON form
});

Flight::route("GET /students/@name", function($name){ //ovo @name je path 
    echo "Hello from / students route with name = " .$name;
});

Flight::route("GET /students/@name/@status", function($name, $status){ //ovo @name je path 
    echo "Hello from / students route with name = " .$name. " and status = " .$status;
});


Flight::start();