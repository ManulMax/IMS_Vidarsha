<?php

class viewStudent_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }


    public function listStudent(){

        return $this->db->listWhere("*","student","deleted=0");
    

    }

    public function listSubjects(){

        return $this->db->listAll("subject");
        

    }

    public function listDetails($userid){

        return $this->db->listWhere("*","staff","user_id=$userid");
    

    }

     public function listStuDetails($userid){

        return $this->db->listWhere("s.fname,s.tel_no,s.address,s.NIC,s.DOB,s.gender,s.email,s.school,s.grade,s.stream,p.name,p.tel_no,sb.subject1,sb.subject2,sb.subject3","student s, parent p, studentsubject sb","user_id=$userid and p.stu_reg_no=s.reg_no and sb.stu_reg_no=s.reg_no");
    

    }

    
     public function delete($userid){
        $this->db->update('student',"deleted=1","user_id=$userid");

    }

    

   

   
   




}