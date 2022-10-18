<?php
require_once './app/views/appView.php';
require_once './app/models/accountsModel.php';
require_once './app/views/accountsView.php';            
require_once './app/models/tracksModel.php';
require_once './app/views/tracksView.php';            
require_once './app/models/genresModel.php';
require_once './app/views/genresView.php';            
require_once './app/models/countriesModel.php';
require_once './app/views/countriesView.php';            
require_once './app/views/adminView.php';            
require_once './app/views/authView.php';            

class appController {
    public $appView;
    public $accountsModel;
    public $accountsView;
    public $tracksModel;
    public $tracksView;
    public $genresModel;
    public $genresView;
    public $countriesModel;
    public $countriesView;
    public $adminView;
    public $authView;

    public function __construct() {        
        $this->appView = new appView(); 
        $this->accountsModel = new accountsModel;  
        $this->accountsView = new accountsView();   
        $this->tracksModel = new tracksModel(); 
        $this->tracksView = new tracksView();   
        $this->genresModel = new genresModel(); 
        $this->genresView = new genresView();   
        $this->countriesModel = new countriesModel(); 
        $this->countriesView = new countriesView();   
        $this->adminView = new adminView(); 
        $this->authView = new authView();  
    }

    public function printHeader() {
        session_start();
        if (!isset($_SESSION["name"])) {
            $_SESSION["loggedin"] = false;
            $_SESSION["rol"] = 3;
            $this->appView->showHeader();
        } else {
            $account = $this->accountsModel->getAccount($_SESSION["name"]);
            $this->appView->showHeader($account);
        }        
    }

    public function printFooter() {
        $this->appView->showFooter();
    }

    public function printCaptcha() {   
        $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';            
        $captcha = '';
        
        for($i = 0; $i < 5; $i++) {
            $random_character = $permitted_chars[mt_rand(0, strlen($permitted_chars))];
            $captcha .= $random_character;
        }

        return $captcha;
    }

    public function printSystemManagement($management) {
        if ($_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            
            $tracks = $this->tracksModel->getTracks();
            $genres = $this->genresModel->getGenres();
            $accounts = $this->accountsModel->getAllAccounts();
            $roles = $this->accountsModel->getRoles();

            $this->adminView->showSystemManagement($tracks, $genres, $accounts, $roles, $management); 
        } else {
            header("location:".BASE_URL);
        }
    }

    public function search($search) {
        $search = $_GET["q"];
        $tracks = $this->tracksModel->searchTracks($search);
        $accounts = $this->accountsModel->searchAccounts($search);   
        
        if (!$tracks && !$accounts) {
            $this->appView->showSearch($search); 
        }
        
        if($tracks) {
            $this->tracksView->showTracks($tracks); 
        }
        if($accounts) {
            $this->accountsView->showAccounts($accounts); 
        }
    }
}

