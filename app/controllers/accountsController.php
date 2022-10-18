<?php

require_once './app/controllers/appController.php';            

class accountsController extends appController {

    public function printAbout($profile) {
        $tracks = $this->tracksModel->getTracksBy($profile);
        $genres = $this->genresModel->getGenres();
        $account = $this->accountsModel->getAccount($profile);

        $this->accountsView->showAbout($account, $tracks, $genres);  
    }

    public function printAccounts() {
        $accounts = $this->accountsModel->getAllAccounts();
        $this->accountsView->showAccounts($accounts); 
    }

    public function printAccountsStories() {
        $accounts = $this->accountsModel->getAllAccounts();
        $this->accountsView->showAccountsStories($accounts); 
    }

    public function printProfileManager($profile, $setting) {
        if ($profile==$_SESSION["name"]) {  
            $countries = $this->countriesModel->getCountries();
            $genres = $this->genresModel->getGenres();                    
            $account = $this->accountsModel->getAccount($profile);
            $captcha = $this->printCaptcha();
            
            $this->accountsView->showProfileManager($account, $countries, $genres, $setting, $captcha);            
        } else {
            header("location:".BASE_URL);
        }             
    } 

    public function editProfile($profile, $request) {
        $account = $this->accountsModel->getAccount($profile); 
        $id = $account->id;
        if ($request=="owner") {            
            if ($_FILES) {   
                if ($_FILES['profilePhoto']['type'] == "image/jpg" || $_FILES['profilePhoto']['type'] == "image/jpeg" || $_FILES['profilePhoto']['type'] == "image/png")  {
                    $photo = $_FILES["profilePhoto"]["tmp_name"];   
                    $photo_dir = "./images/profile_photos/".uniqid("", true).".".strtolower(pathinfo($_FILES['profilePhoto']['name'], PATHINFO_EXTENSION));
                    
                    $this->accountsModel->editProfilePhoto($id, $photo, $photo_dir); 
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
    
                            $this->accountsModel->editProfilePassword($id, $password);
                            header("location:".BASE_URL."logout/"); 
                            header("Refresh:0; url=".BASE_URL."login/"); 
    
                        } else {
                            $countries = $this->countriesModel->getCountries();
                            $genres = $this->genresModel->getGenres();
    
                            $captcha = $this->printCaptcha();
                            $this->accountsView->showProfileManager($account, $countries, $genres, "security", $captcha, "The passwords no match"); 
                        }                       
                    } else {                    
                        if (!empty($_POST["name"])) {
                            $nameParam = $_POST["name"];
                            $accountExist = $this->accountsModel->getAccount($nameParam); 
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
                            $accountExist = $this->accountsModel->getAccount($AKAParam); 
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
    
                            $this->accountsModel->editProfile($id, $name, $AKA, $genre, $country);
                            header("location:".BASE_URL."logout/"); 
                            header("Refresh:0; url=".BASE_URL."login/"); 
                            
                        } else {
                            $countries = $this->countriesModel->getCountries();
                            $genres = $this->genresModel->getGenres();    
                            $captcha = $this->printCaptcha();

                            $this->accountsView->showProfileManager($account, $countries, $genres, "general", $captcha, $error);
                        }                                
                    };
                } else {
                    $countries = $this->countriesModel->getCountries();
                    $genres = $this->genresModel->getGenres();    
                    $captcha = $this->printCaptcha();

                    $error = "The password is incorrect";
                    $this->accountsView->showProfileManager($account, $countries, $genres, "general", $captcha, $error); 
                }
            }                        
        } else if ($request=="admin" && (isset($_POST["user_rol"]) && ($_SESSION["rol"]==0 || $_SESSION["rol"]==1))) {
            $rol = $_POST["user_rol"];
            $this->accountsModel->editProfileRol($id, $rol);
            header("Location:".$_SERVER["HTTP_REFERER"]);
        } else {
            header("location:".BASE_URL);
        }
    }

    public function deleteProfilePhoto($profile) {
        if ($profile==$_SESSION["name"]) {
            $account = $this->accountsModel->getAccount($profile); 
            $id = $account->id;
            $this->accountsModel->deleteProfilePhoto($id); 
            header("location:".BASE_URL."account/".$profile."/"); 
        } else {
            header("location:".BASE_URL); 
        }
    }

    public function deleteProfile($profile, $request) {        
        $account = $this->accountsModel->getAccount($profile); 
        $id = $account->id; 

        if ($request=="owner" && $account->id==$_SESSION["user_id"]) {            
            
            if ($_POST["password"] && password_verify($_POST["password"],($account->password))) {
                header("location:".BASE_URL."logout/");  
                $this->accountsModel->deleteProfile($id); 
                header("Refresh:0; url=".BASE_URL."home/"); 
            } else {
                $error = "Wrong password.";
                $countries = $this->countriesModel->getCountries();
                $genres = $this->genresModel->getGenres();    
                $captcha = $this->printCaptcha();

                $this->accountsView->showProfileManager($account, $countries, $genres, "delete", $captcha, $error);
            }
            
        } else if (($request=="admin" && $_SESSION["rol"]==0) || ($request=="admin" && $_SESSION["rol"]==1)) {
            $this->accountsModel->deleteProfile($id); 
            header("location:".$_SERVER['HTTP_REFERER']);
        } else {
            header("location:".BASE_URL);
        }
    }
}
