<?php
require_once './app/models/accountsModel.php';
require_once './app/views/accountsView.php';
require_once './app/controllers/appController.php';            

class accountsController {
    private $view;
    private $model;
    private $appController;

    public function __construct() {
        $this->model = new accountsModel();
        $this->view = new accountsView();
        $this->appController = new appController();  
    }

    public function printAbout($profile) {
        require_once './app/models/tracksModel.php';
        $tracksModel = new tracksModel();
        $tracks = $tracksModel->getTracksBy($profile);

        require_once './app/models/genresModel.php';
        $genresModel = new genresModel();
        $genres = $genresModel->getGenres();

        $account = $this->model->getAccount($profile);
        $this->view->showAbout($account, $tracks, $genres);  
    }

    public function printAccounts() {
        $accounts = $this->model->getAllAccounts();
        $this->view->showAccounts($accounts); 
    }

    public function printAccountsStories() {
        $accounts = $this->model->getAllAccounts();
        $this->view->showAccountsStories($accounts); 
    }

    public function printProfileManager($profile, $setting) {
        if ($profile==$_SESSION["name"]) {  
            require_once './app/models/countriesModel.php';
            $countriesModel = new countriesModel();
            $countries = $countriesModel->getCountries();

            require_once './app/models/genresModel.php';
            $genresModel = new genresModel();
            $genres = $genresModel->getGenres();
                    
            $account = $this->model->getAccount($profile);
            $captcha = $this->appController->printCaptcha();
            
            $this->view->showProfileManager($account, $countries, $genres, $setting, $captcha);            
        } else {
            header("location:".BASE_URL);
        }             
    } 

    public function editProfile($profile, $request) {
        $account = $this->model->getAccount($profile); 
        $id = $account->id;
        if ($request=="owner") {            
            if ($_FILES) {   
                if ($_FILES['profilePhoto']['type'] == "image/jpg" || $_FILES['profilePhoto']['type'] == "image/jpeg" || $_FILES['profilePhoto']['type'] == "image/png")  {
                    $photo = $_FILES["profilePhoto"]["tmp_name"];   
                    $photo_dir = "./images/profile_photos/".uniqid("", true).".".strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));
                    
                    $this->model->editProfilePhoto($id, $photo, $photo_dir); 
                    header("location:".BASE_URL."account/".$profile."/"); 
                } else {
                    $error = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                }             
            } else if($_POST["password"]) {
                $passwordParam = $_POST["password"];

                if(password_verify($passwordParam, $account->password)){
                    if (isset($_POST["passwordNew"])) {
                        if (($_POST['passwordNew']==$_POST['passwordConfirm'])) {
                            $password = password_hash($_POST['passwordNew'], PASSWORD_BCRYPT); 
    
                            $this->model->editProfilePassword($id, $password);
                            header("location:".BASE_URL."logout/"); 
                            header("Refresh:0; url=".BASE_URL."login/"); 
    
                        } else {
                            require_once './app/models/countriesModel.php';
                            $countriesModel = new countriesModel();
                            $countries = $countriesModel->getCountries();
    
                            require_once './app/models/genresModel.php';
                            $genresModel = new genresModel();
                            $genres = $genresModel->getGenres();
    
                            $captcha = $this->appController->printCaptcha();
                            $this->view->showProfileManager($account, $countries, $genres, "security", $captcha, "The passwords no match"); 
                        }                       
                    } else {                    
                        if (!empty($_POST["name"])) {
                            $nameParam = $_POST["name"];
                            $accountExist = $this->model->getAccount($nameParam); 
                            if ($accountExist && $accountExist->id!=$_SESSION["user_id"]) {
                                $error = "This user name is already taken";                            
                            } else {
                                $name = $nameParam;
                            }
                        } else {
                            $nameParam = $_SESSION["name"];
                        }
                        if (!empty($_POST["AKA"])) {
                            $AKAParam = $_POST["AKA"];
                            $accountExist = $this->model->getAccount($AKAParam); 
                            if ($accountExist && $accountExist->id!=$_SESSION["user_id"]) {
                                $error = "This AKA is already taken";                            
                            } else {
                                $AKA = $AKAParam;
                            }
                        } else {
                            $AKAParam = $_SESSION["AKA"];
                        }           
                         
                        if (!$error) {
                            $name = $nameParam;
                            $AKA = $AKAParam;
                            $genre = $_POST["genre"];
                            $country = $_POST["country"];
    
                            $this->model->editProfile($id, $name, $AKA, $genre, $country);
                            header("location:".BASE_URL."logout/"); 
                            header("Refresh:0; url=".BASE_URL."login/"); 
                            
                        } else {
                            require_once './app/models/countriesModel.php';
                            $countriesModel = new countriesModel();
                            $countries = $countriesModel->getCountries();
    
                            require_once './app/models/genresModel.php';
                            $genresModel = new genresModel();
                            $genres = $genresModel->getGenres();
    
                            $captcha = $this->appController->printCaptcha();
                            $this->view->showProfileManager($account, $countries, $genres, "general", $captcha, $error);
                        }                                
                    };
                } else {
                    require_once './app/models/countriesModel.php';
                    $countriesModel = new countriesModel();
                    $countries = $countriesModel->getCountries();
    
                    require_once './app/models/genresModel.php';
                    $genresModel = new genresModel();
                    $genres = $genresModel->getGenres();
    
                    $captcha = $this->appController->printCaptcha();
                    $error = "The password is incorrect";
                    $this->view->showProfileManager($account, $countries, $genres, "general", $captcha, $error); 
                }
            }                        
        } else if ($request=="admin" && (isset($_POST["user_rol"]) && ($_SESSION["rol"]==0 || $_SESSION["rol"]==1))) {
            $rol = $_POST["user_rol"];
            $this->model->editProfileRol($id, $rol);
            header("Location:".$_SERVER["HTTP_REFERER"]);
        } else {
            header("location:".BASE_URL);
        }
    }

    public function deleteProfilePhoto($profile) {
        if ($profile==$_SESSION["name"]) {
            $account = $this->model->getAccount($profile); 
            $id = $account->id;
            $this->model->deleteProfilePhoto($id); 
            header("location:".BASE_URL."account/".$profile."/"); 
        } else {
            header("location:".BASE_URL); 
        }
    }

    public function deleteProfile($id) {
        session_start();
        if ($id==$_SESSION["user_id"] || $_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            if ($_SESSION["rol"]==2 || $id==$_SESSION["user_id"]) {
                header("location:".BASE_URL."logout/");  
                header("Refresh:0; url=".BASE_URL."home/");
            } else {
                header("location:".$_SERVER['HTTP_REFERER']); 
            }
            $this->model->deleteProfile($id); 
        } else {
            header("location:".BASE_URL);
        } 
    }
}
