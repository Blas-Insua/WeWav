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

    public function editGenre($id) {
        if ($_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            $genre = $_POST["genre"];
            $this->model->editGenre($id, $genre);
            header("location:".$_SERVER['HTTP_REFERER']); 
        }        
    }

    public function deleteGenre($id) {
        if ($_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            $this->model->deleteGenre($id);
        }          
    }
}