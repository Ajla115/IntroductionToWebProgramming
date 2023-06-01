<?php
    require_once "BaseDao.class.php";
class StudentDao extends BaseDao{
    //ne zaboraviti ovo extends ovdje
       
   //Class constructor used to establish connection
      public function __construct(){
            parent::__construct("students"); //ovdje ide name of the table
        }
}























?>