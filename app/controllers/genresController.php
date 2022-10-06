<?php
require_once './app/models/genresModel.php';
require_once './app/views/genresView.php';

class genresController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new genresModel();
        $this->view = new genresView();
    }

    public function printGenres() {
        $genres = $this->model->getGenres();
        $this->view->showGenres($genres);
    }
}