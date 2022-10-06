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
        require_once './app/models/genresModel.php';
        $genresModel = new genresModel();
        $genres = $genresModel->getGenres();

        $tracks = $this->model->getTracks();
        $this->view->showTracks($tracks, $genres);
    }

    public function printUploadSection() {
        if ($_SESSION["rol"]!=3) {
            require_once './app/models/genresModel.php';
            $genresModel = new genresModel();
            $genres = $genresModel->getGenres();

            $this->view->showUploadSection($genres);
        } else {
            header("location:".BASE_URL."login/");
        }        
    }

    public function uploadFile() {
        session_start();
        $user_id = $_SESSION["user_id"];
        $trackName = $_POST["uploadFileName"];
        $trackGenre = $_POST["uploadFileGenre"];
        $trackDate = $_POST["uploadFileDate"];

        $this->model->uploadFile($user_id, $trackName, $trackGenre, $trackDate);

        header("Location:".BASE_URL."about/".$_SESSION["name"]."/"); 
    }

    public function deleteFile($trackID) {
        session_start();
        if ($_SESSION["rol"] != 3) {
            $this->model->deleteFile($trackID);
            header("location:".$_SERVER['HTTP_REFERER']);
        } else {
            header("location:".BASE_URL."login/");
        }
    }

    public function editFile($trackID) {
        session_start();
        $trackName = $_POST["name"];
        $trackGenre = $_POST["genre"];
        $trackDate = $_POST["date"];

        $this->model->editFile($trackID, $trackName, $trackGenre, $trackDate);

        header("location:".$_SERVER['HTTP_REFERER']); 
    }

    public function printTracksByGenre($filter) {
        require_once './app/models/genresModel.php';
        $genresModel = new genresModel();
        $genres = $genresModel->getGenres();

        $tracks = $this->model->getTracksBy($filter);
        if ($tracks) {
            $this->view->showTracks($tracks, $genres);
        } else {
            $this->view->showTracksErr($filter);
        }        
    }
}