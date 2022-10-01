<?php
require_once './app/models/accountsModel.php';
require_once './app/views/accountsView.php';

class accountsController {
    private $view;
    private $model;

    public function __construct() {
        $this->model = new accountsModel();
    }
    public function printSignupForm() {
        require_once './app/models/countriesModel.php';
        $countriesModel = new countriesModel();
        $countries = $countriesModel->getCountries();

        require_once './app/models/genresModel.php';
        $genresModel = new genresModel();
        $genres = $genresModel->getGenres();
        
        $this->view = new signupFormView();
        $this->view->showSignupForm($countries, $genres);
    }

    public function signupSubmit() {
        $this->model->signupSubmit();
    }

    public function About($profile) {
        require_once './app/models/tracksModel.php';
        $tracksModel = new tracksModel();
        $tracks = $tracksModel->getTracksByAcc($profile);

        $account = $this->model->getAccount($profile);
        $this->view = new accountsView();
        $this->view->showAbout($account, $tracks);  
    }

    public function printAccounts() {
        $accounts = $this->model->getAllAccounts();
        $this->view = new accountsView();
        $this->view->showAccounts($accounts); 
    }
}
