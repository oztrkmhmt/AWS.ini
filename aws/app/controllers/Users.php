<?php

class Users extends Controller {
    
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->sessionUser = new SessionUsers;

    }

    public function login() {

        echo("burada");
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = ['username' => trim($_POST['username']), 'password' => trim($_POST['password']), 'username_err' => '', 'password_err' => '']; 
        if(isset($_SESSION['username'])){
            $data['username'] = $_SESSION['username'];
        }
        if(isset($_SESSION['password'])){
            $data['password'] = $_SESSION['password'];
        }
        $this->view('policy/login', $data);
        }
          
    //Session logout
    public function logout() {
        unset($_SESSION['AWSession']);
        session_destroy();
        redirect('policy/login');
    }

}