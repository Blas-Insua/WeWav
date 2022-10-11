<?php
require_once './app/views/appView.php';

class appController {
    private $model;
    private $view;

    public function __construct() {
        $this->appView = new appView();        
    }

    public function printHeader() {
        session_start();
        if (!isset($_SESSION["name"])) {
            $_SESSION["loggedin"] =false;
            $_SESSION["rol"] = 3;
        };
        $this->appView->showHeader($_SESSION["rol"]);
    }

    public function printFooter() {
        $this->appView->showFooter($_SESSION["rol"]);
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
            $this->view = new adminView();
            $this->view->showSystemManagement($tracks, $genres, $accounts, $roles, $management); 
        } else {
            header("location:".BASE_URL);
        }
    }
}