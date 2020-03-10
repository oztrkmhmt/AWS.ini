<?php

class Users extends Controller {
    
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->sessionUser = new SessionUsers;

    }
          
    //Session logout
    public function logout() {
        unset($_SESSION['AWSession']);
        session_destroy();
        redirect('policy/login');
    }

}
