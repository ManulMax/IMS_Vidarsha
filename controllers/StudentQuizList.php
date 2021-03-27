<?php

class StudentQuizList extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index($name,$batch){
    	$this->view->userDetails = $this->model->listDetails($_SESSION["userid"]);
    	$this->view->studentSubject = $this->model->listStudentSubjects($_SESSION["userid"]);
    	$this->view->batch = $batch;
        Session::set('subject',$name);
        Session::set('batch',$batch);
        $this->view->qlist = $this->model->listQuizzes($name,$batch);
        $this->view->render('student/StudentQuizList');
    }

    function renderQuizPage($id){
        $this->view->classList = $this->model->listClasses($_SESSION["userid"]);
        $this->view->userDetails = $this->model->listDetails($_SESSION["userid"]);
        $this->view->quiz = $this->model->getQuiz($id);
        $this->view->render('student/participateQuizLandingPage');
    }
}