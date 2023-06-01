<?php

require "../vendor/autoload.php";
require "dao/StudentDAO.class.php";
require "dao/CourseDAO.class.php";

require "services/StudentService.php";
require "services/CourseService.php";

//koliko imam ovih services, sve ih trebam ovdje pozvati

Flight::register('student_service', "StudentService");
Flight::register('course_service', "CourseService");

//umjesto DAO, jer sada routes poziva preko services, ovdje trebam sve services registrovati

require_once "routes/StudentRoutes.php";
require_once "routes/CourseRoutes.php";


Flight::start();

//routes accept the request and redirect
//services perform some logic 
//dao - data access object, create connection to the db, make communications, rest operations


?>


