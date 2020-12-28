<?php

class paperMarkerRegistration extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->classList = $this->model->listClasses($_SESSION["userid"]);
        $this->view->userDetails = $this->model->listDetails($_SESSION["userid"]);
        $this->view->pmList = $this->model->listPaperMarkers();
        
        $this->view->render('teacher/paperMarkerRegistration');
    }

    function create(){

        $data = array();
        $data['name'] = $_POST['name'];
        $data['tel_no'] = $_POST['tel'];
        $data['address'] = $_POST['address'];
        $data['NIC'] = $_POST['NIC'];
        $data['gender'] = $_POST['gender'];
        $data['DOB'] = $_POST['DOB'];
        $data['email'] = $_POST['email'];
        $data['qualifications'] = $_POST['qualifications'];


        $this->model->create($data);
        header('location: '.URL.'paperMarkerRegistration');
    }

    function renderPmUpdate($userPm){
        $this->view->pmDetails = $this->model->listPmDetails($userPm);
        $this->view->render('teacher/input');
    }

    function update(){

        $data = array();
        $data['name'] = $_POST['name-update'];
        $data['tel_no'] = $_POST['tel-update'];
        $data['address'] = $_POST['address-update'];
        $data['NIC'] = $_POST['NIC-update'];
       // $data['gender'] = $_POST['gender-update'];
        $data['DOB'] = $_POST['DOB-update'];
        $data['email'] = $_POST['email-update'];
        $data['qualifications'] = $_POST['qualifications-update'];


        $this->model->update($data);
        header('location: '.URL.'paperMarkerRegistration');
    }

    
}