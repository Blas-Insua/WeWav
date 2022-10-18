<?php
require_once './app/controllers/appController.php';

class genresController extends appController{

    public function printGenres() {
        $genres = $this->genresModel->getGenres();
        $this->genresView->showGenres($genres);
    }

    public function editGenre($id) {
        if ($_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            $genre = $_POST["genre"];
            $this->genresModel->editGenre($id, $genre);
            header("location:".$_SERVER['HTTP_REFERER']); 
        }        
    }

    public function deleteGenre($id) {
        if ($_SESSION["rol"]==0 || $_SESSION["rol"]==1) {
            $this->genresModel->deleteGenre($id);
        }          
    }
}