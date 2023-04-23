<?php
/*ovo je index.php bez services, znaci routes direktno poziva DAO, ali sad kad imamo services onda ce to ici preko njih, jer routes poziva service, a service DAO*/
/*require "../vendor/autoload.php";
require "dao/StudentDAO.class.php";
require "dao/CourseDAO.class.php";

//koliko imam ovih DAO, sve ih trebam ovdje pozvati

Flight::register('student_dao', "StudentDao");
Flight::register('course_dao', "CourseDao");

//umjesto da u svakoj ruti zovemo objekat klase StudentDao, dovoljno je kao jednom definisati alias za njega i po tome ga zvati

require_once "routes/StudentRoutes.php";
require_once "routes/CourseRoutes.php";


Flight::start();

//routes accept the request and redirect
//services perform some logic 
//dao - data access object, create connection to the db, make communications, rest operations

*/

?>