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
            $this->view->showSignupForm($captcha, 'This user name or AKA is already taken.');
        } else {
            if ($_FILES) {                
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];
                $target_dir  = "./images/profile_photos/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $extensions_arr  = array('jpg','png','jpeg');
                if(in_array($imageFileType, $extensions_arr)){
                    
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename)){
                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents("./images/profile_photos/".$filename) );
                        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                        if (($passwordParam==$_POST['passConfirm'])) {
                            $password = password_hash($passwordParam, PASSWORD_BCRYPT); 
                            $this->model->createAccount($name, $AKA, $password, $genre, $country, $image, $target_dir.$filename);
                            header("location:".BASE_URL."login/");
                            
                        } else { 
                            $error = 'The passwords no match.'; 
                        }
                    } else {
                        $error = "upload error";
                    }
                }else{
                    $error = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                }  
            } else {
                if (($passwordParam==$_POST['passConfirm'])) {
                    $password = password_hash($passwordParam, PASSWORD_BCRYPT); 
                    $this->model->createAccount($name, $AKA, $password, $genre, $country); 
                } else {                      
                    $error = 'The passwords no match.'; 
                }
            };
            if (!$error) {
                header("location:".BASE_URL."login/");
            } else {
                $captcha = $this->appController->printCaptcha(); 
                $this->view->showSignupForm($captcha, $error);
            }
        };
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