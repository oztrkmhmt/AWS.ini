<?php

class LoginDetails extends Controller {
    
    public function __construct() {
        $this->loginDetailsModel = $this->model('LoginDetails');
        $this->sessionUser = new SessionUsers;

    }

    //Login details
    public function logindetails() {
        if(!isLoggedIn()){
            redirect('policy/login');
        }else{
        $data = ['username' => $_SESSION['name'], 'password' => $_SESSION['pass'], ];
        //load login details model
        $this->loginDetailsModel->GetLoginDetails($data);
        $this->view('policy/logindetails', $data);
        }
    }
}