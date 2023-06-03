<?php
//kad radimo extend odmah nam treba require!
require_once "BaseService.php";
require_once  __DIR__.'/../dao/StudentDAO.class.php';
class StudentService extends BaseService{
   
    
    public function __construct(){
        parent::__construct(new StudentDao);

    }

    public function update($student, $id){
        $student['password']= md5($student['password']);
        if(isset($student['id_column']) && !is_null($student['id_column'])){
            return parent::update($student, $id, $student['id_column']);
        }
        return parent::update($student, $id);
    }

    public function add($entity){
        $entity['password']= md5($entity['password']);
        return parent::add($entity);
        //send an email
        //logic processing happens in the services
       /* if(validateField($entity['first_name'])){
            error;
        } --> these are some general methods, myb try creating util, some form processingetc*/
        //you can have additional classes that are placed in a new folder, that are not exactly related to entities*/



    }


}