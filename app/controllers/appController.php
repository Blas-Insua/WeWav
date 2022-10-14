<?php
require_once './app/views/appView.php';

class appController {
    private $model;
    private $view;

    public function __construct() {
        $this->view = new appView();        
    }

    public function printHeader() {
        session_start();
        if (!isset($_SESSION["name"])) {
            $_SESSION["loggedin"] = false;
            $_SESSION["rol"] = 3;
            $this->view->showHeader();
        } else {
            require_once './app/models/accountsModel.php';
            $accountsModel = new accountsModel;
            $account = $accountsModel->getAccount($_SESSION["name"]);
            $this->view->showHeader($account);
        };        
    }

    public function printFooter() {
        $this->view->showFooter($_SESSION["rol"]);
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
            require_once './app/models/tracksModel.php';
            $tracksModel = new tracksModel();
            $tracks = $tracksModel->getTracks();

            require_once './app/models/genresModel.php';
            $genresModel = new genresModel();
            $genres = $genresModel->getGenres();

            require_once './app/models/accountsModel.php';
            $accountsModel = new accountsModel();
            $accounts = $accountsModel->getAllAccounts();
            $roles = $accountsModel->getRoles();

            require_once './app/views/adminView.php';
            $this->adminView = new adminView();
            $this->adminView->showSystemManagement($tracks, $genres, $accounts, $roles, $management); 
        } else {
            header("location:".BASE_URL);
        }
    }

    public function search($search) {
        $search = $_GET["q"];
        require_once './app/models/tracksModel.php';
        $tracksModel = new tracksModel();
        $tracks = $tracksModel->searchTracks($search);

        require_once './app/models/accountsModel.php';
        $accountsModel = new accountsModel();
        $accounts = $accountsModel->searchAccounts($search);   
        
        if (!$tracks && !$accounts) {
            $this->view->showSearch($search); 
        }
        
        if($tracks) {
            require_once './app/views/tracksView.php';
            $tracksView = new tracksView();
            $tracksView->showTracks($tracks); 
        }
        if($accounts) {
            require_once './app/views/accountsView.php';
            $accountsView = new accountsView();
            $accountsView->showAccounts($accounts); 
        }
    }
}