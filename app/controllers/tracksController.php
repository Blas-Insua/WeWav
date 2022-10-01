<?php
require_once './app/models/tracksModel.php';
require_once './app/views/tracksView.php';

class tracksController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new tracksModel();
        $this->view = new tracksView();
    }

    public function printTracks() {
        $tracks = $this->model->getTracks();
        $this->view->showTracks($tracks);
    }

    public function printUploadSection() {
        $this->view->showUploadSection();
    }
}