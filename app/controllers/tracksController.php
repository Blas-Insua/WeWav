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
        if (isset($_SESSION["loggedin"])) {
            $user_id = $_SESSION["user_id"];
            $trackName = $_POST["uploadFileName"];
            $trackGenre = $_POST["uploadFileGenre"];
            $trackDate = $_POST["uploadFileDate"];
            if ($_FILES) {   
                if ($_FILES['trackPhoto']['type'] == "image/jpg" || $_FILES['trackPhoto']['type'] == "image/jpeg" || $_FILES['trackPhoto']['type'] == "image/png")  {
                    $photo = $_FILES["trackPhoto"]["tmp_name"];   
                    $photo_dir = "./images/tracks_photos/".uniqid("", true).".".strtolower(pathinfo($_FILES['trackPhoto']['name'], PATHINFO_EXTENSION));
                    
                    $this->model->uploadFile($user_id, $trackName, $trackGenre, $trackDate, $photo, $photo_dir);
    
                } else {
                    $error = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                }             
            } else {
                $this->model->uploadFile($user_id, $trackName, $trackGenre, $trackDate);
            }

            

            header("Location:".BASE_URL."about/".$_SESSION["name"]."/");
        } else {
            header("Location:".BASE_URL."login/");
        }         
    }

    public function deleteFile($trackID) {
        session_start();
        if (isset($_SESSION["loggedin"])) {
            $track = $this->model->getFile($trackID);

            if ($_SESSION["user_id"]==$track->user_id || ($_SESSION["rol"]==0 || $_SESSION["rol"]==1)){
                $this->model->deleteFile($trackID);
                header("location:".$_SERVER['HTTP_REFERER']);
            } else {
                header("Location:".BASE_URL);
            }
        } else {
            header("Location:".BASE_URL."login/");
        } 
    }

    public function editFile($trackID) {
        session_start();
        if (isset($_SESSION["loggedin"]) && isset($_POST["editFile"])) {
            $track = $this->model->getFile($trackID);

            if ($_SESSION["user_id"]==$track->user_id){
                $trackName = $_POST["name"];
                $trackGenre = $_POST["genre"];
                $trackDate = $_POST["date"];

                $this->model->editFile($trackID, $trackName, $trackGenre, $trackDate);

                header("location:".$_SERVER['HTTP_REFERER']);
            } else {
                header("Location:".BASE_URL);
            }
        } else {
            header("Location:".BASE_URL."login/");
        }      
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