<?php

class enrollStudent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->userDetails = $this->model->listDetails($_SESSION["userid"]);
        $this->view->subjectList = $this->model->listSubjects();
        $this->view->classCapacity = $this->model->listClassCapacity();
    	$this->view->render('staff/enrollStudent');
    }

    function renderEnrollStudent($reg,$name,$image){
        $this->view->stuName = $name;
        $this->view->stuReg = $reg;
        $this->view->image = $image;
        $this->view->userDetails = $this->model->listDetails($_SESSION["userid"]);
        $this->view->subjectList = $this->model->listSubjects();
        $this->view->classCapacity = $this->model->listClassCapacity();
        $this->view->render('staff/enrollStudent');
    }

    

    function create(){

        $data = array();
        $data['stu_reg_no'] = $_POST['regNum'];
        $data['subject'] = $_POST['subject'];
        $data['batch'] = $_POST['batch'];

        $result=$this->model->create($data);
         if($result == 1){
            header('location: '.URL.'enrollStudent?alert1=success');
        }else{
            header('location: '.URL.'enrollStudent?alert1=fail');
        }
        
    }

    function search(){
        $reg = $_POST['regNo'];
        $del = $this->model->checkStudent($reg);
        $deleted = mysqli_fetch_assoc($del);
        if($deleted['deleted']==1){
            header('location: '.URL.'enrollStudent?alert2=fail1');
        }else if($deleted['deleted']==0){
            $stuDet = $this->model->liststuDetails($reg);
            $row = mysqli_fetch_assoc($stuDet);
            $this->renderEnrollStudent($reg,$row['fname'],$row['image']);
        } 
        else{
           header('location: '.URL.'enrollStudent?alert2=fail2');  
        }  	
    }
}  