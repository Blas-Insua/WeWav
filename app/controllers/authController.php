<?php
require_once './app/models/accountsModel.php';
require_once './app/views/authView.php';
require_once './app/controllers/appController.php';
                

class authController {
    private $view;
    private $model;
    private $appController;

    public function __construct() {
        $this->model = new accountsModel();
        $this->view = new authView();
        $this->appController = new appController(); 
    }

    public function signup() {
        $name = $_POST['name'];
        $AKA = $_POST['AKA'];
        $passwordParam = $_POST['pass'];
        $genre = $_POST['genre'];
        $country = $_POST['country'];

        $account = $this->model->getAccount($name);

        if ($account) {
            $captcha = $this->appController->printCaptcha();
            $error = 'This user name or AKA is already taken.';
        } else {
            if (($passwordParam==$_POST['passConfirm'])) {
                $password = password_hash($passwordParam, PASSWORD_BCRYPT); 
                if ($_FILES) {   
                    if ($_FILES['profilePhoto']['type'] == "image/jpg" || $_FILES['profilePhoto']['type'] == "image/jpeg" || $_FILES['profilePhoto']['type'] == "image/png")  {
                        $photo = $_FILES["profilePhoto"]["tmp_name"];   
                        $photo_dir = "./images/profile_photos/".uniqid("", true).".".strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));
                        
                        $this->model->createAccount($name, $AKA, $password, $genre, $country, $photo, $photo_dir); 
        
                    } else {
                        $error = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                    }             
                } else {
                    $this->model->createAccount($name, $AKA, $password, $genre, $country); 
                }
            } else {                      
                $error = 'The passwords no match.'; 
            }
        }
        

        if (!$error) {
            header("location:".BASE_URL."login/");
        } else {
            $captcha = $this->appController->printCaptcha(); 
            $this->view->showSignupForm($captcha, $error);
        }
    }

    public function printLoginForm() { 
        $captcha = $this->appController->printCaptcha();
        $this->view->showLoginForm($captcha);
    }

    public function printSignupForm() {  
        $captcha = $this->appController->printCaptcha();
        $this->view->showSignupForm($captcha);
    }

    public function login() {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $account = $this->model->getAccount($name);

        if ($account) {
            if (password_verify($password,($account->password))) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $account->id;
                $_SESSION["name"] = $account->name;
                $_SESSION["AKA"] = $account->AKA;
                $_SESSION["rol"] = $account->rol_id;
                header("location:".BASE_URL); 
            } else {
                $captcha = $this->appController->printCaptcha();
                $this->view->showLoginForm($captcha, 'Wrong password');
            }
        } else {
            $captcha = $this->appController->printCaptcha();
            $this->view->showLoginForm($captcha, 'Account not found with that username.');
        };
    }

    public function logout() {
        session_start();
        session_destroy();
        header("location:".BASE_URL);
    }
}