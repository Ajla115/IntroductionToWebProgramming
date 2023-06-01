<?php
require_once "BaseDao.class.php";
class CourseDao extends BaseDao{
   //ne zaboraviti ovo extends ovdje
   
    //Class constructor used to establish connection
    public function __construct(){
        parent::__construct("courses"); //ovdje ide name of the table
    }

    public function get_all(){
        return parent::get_all();
    }
    //nije potrebno pisati i ovako pozivati ove funkcije
    //cim je pozovemo, odmah ce otici u BaseDao, da je nade
    //jedino ako zelimo da je overridemo, onda ovdje napisati i pozvati tu funkciju i body za nju


}





















?>