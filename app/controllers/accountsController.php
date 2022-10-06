<?php
require_once './app/models/accountsModel.php';
require_once './app/views/accountsView.php';

class accountsController {
    private $view;
    private $model;

    public function __construct() {
        $this->model = new accountsModel();
        $this->view = new accountsView();
    }

    public function printSignupForm() {
        require_once './app/models/countriesModel.php';
        $countriesModel = new countriesModel();
        $countries = $countriesModel->getCountries();

        require_once './app/models/genresModel.php';
        $genresModel = new genresModel();
        $genres = $genresModel->getGenres();
        
        $this->view->showSignupForm($countries, $genres);
    }    

    public function signupSubmit() {
        $this->model->signupSubmit();
    }

    public function printLoginForm() { 
        $this->view->showLoginForm();
    }

    public function loginSubmit() {
        $this->model->loginSubmit();
    }

    public function logout() {
        $this->model->logout();
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
            
            $this->view->showProfileManager($account, $countries, $genres, $setting);            
        } else {
            header("location:".BASE_URL."home/");
        }             
    } 

    public function editProfile($id) {
        session_start();
        if ($id==$_SESSION["user_id"] || $_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            $this->model->editProfile($id); 
            header("location:".$_SERVER['HTTP_REFERER']); 
        } else {
            header("location:".BASE_URL."home/");
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
            header("location:".BASE_URL."home/");
        } 
    }
}
