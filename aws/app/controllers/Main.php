<?php

class Main extends Controller {
    
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->envModel = $this->model('Env');
        $this->loginDetailsModel = $this->model('LoginDetails');
        $this->policyScreenModel = $this->model('PolicyScreen');
        $this->sessionUser = new SessionUsers;

    }

    public function login() {
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

    //Atlas Web Service Main
    public function index() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // Initialize data
            $data = ['username' => trim($_POST['username']), 'password' => trim($_POST['password']), 'username_err' => '', 'password_err' => '', ];

            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];  

            //Check username and password
            if (empty($data['username'])) {
                flash('hata_username', 'Kullanıcı adı boş bırakılamaz !' ,'alert alert-danger dispAlert');
                redirect('policy/login');
            }
            if (empty($data['password'])) {
                flash('hata_password', 'Kullanıcı parola boş bırakılamaz !','alert alert-danger dispAlert');
                redirect('policy/login');
            }

            // Check errors and load view
            if (empty($data['username_err']) && empty($data['password_err'])) {
                if ($this->userModel->GetUserHashCode($data)){
                } elseif (isset($_SESSION['userDetail']['errorMessage'])) {
                    if(!empty($_POST['username'] && !empty($_POST['password']))){
                        flash('hata_yakalandi', $_SESSION['userDetail']['errorMessage'],'alert alert-danger');
                    }
                    redirect('policy/login',$data);
                } else {
                    $_SESSION['AWSession'] = $this->sessionUser;
                    $this->envModel->GetFuncURL();
                    $this->loginDetailsModel->GetLoginDetails($data);
                    $this->policyScreenModel->GetPolicyScreen($data);
                    $this->view('policy/main', $data);
                }
                
            } else {
                // Load view with errors
                $this->view('policy/login', $data);
            }
   
        } else {
            // Initialize data
            $data = ['username' => '', 'password' => '', 'username_err' => '', 'password_err' => '', ];
            // Load view
            $this->view('policy/login', $data);
            
            }
        
        
    }
    
}