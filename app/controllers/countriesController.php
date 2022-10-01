<?php
require_once './app/models/countriesModel.php';
require_once './app/views/countriesView.php';

class countriesController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new countriesModel();
        $this->view = new countriesView();
    }

    public function printCountries() {
        $countries = $this->model->getCountries();
        $this->view->showCountries($countries);
    }
}