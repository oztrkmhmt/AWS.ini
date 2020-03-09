<?php

class FuncURL extends Controller {
    
    public function __construct() {
        $this->envModel = $this->model('Env');
        $this->sessionUser = new SessionUsers;

    }

    //Get Service URL
    public function getServURL() {
        if(!isLoggedIn()){
            redirect('policy/login');
        }else{
        $this->envModel->GetFuncURL();
        }
    }
}