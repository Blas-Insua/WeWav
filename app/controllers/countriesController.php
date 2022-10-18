<?php
require_once './app/controllers/appController.php';

class countriesController extends appController {

    public function printCountries() {
        $countries = $this->countriesModel->getCountries();
        $this->countriesView->showCountries($countries);
    }
}