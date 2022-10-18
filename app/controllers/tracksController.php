<?php
require_once './app/controllers/appController.php';

class tracksController extends appController {

    public function printTracks() {
        $tracks = $this->tracksModel->getTracks();
        $this->tracksView->showTracks($tracks);
    }

    public function printUploadSection() {
        if ($_SESSION["rol"]!=3) {
            $genres = $this->genresModel->getGenres();
            $this->tracksView->showUploadSection($genres);
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
                    
                    $this->tracksModel->uploadFile($user_id, $trackName, $trackGenre, $trackDate, $photo, $photo_dir);
    
                } else {
                    $error = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                }             
            } else {
                $this->tracksModel->uploadFile($user_id, $trackName, $trackGenre, $trackDate);
            }
            header("Location:".BASE_URL."about/".$_SESSION["name"]."/");
        } else {
            header("Location:".BASE_URL."login/");
        }         
    }

    public function deleteFile($trackID) {
        session_start();
        if (isset($_SESSION["loggedin"])) {
            $track = $this->tracksModel->getFile($trackID);

            if ($_SESSION["user_id"]==$track->user_id || ($_SESSION["rol"]==0 || $_SESSION["rol"]==1)){
                $this->tracksModel->deleteFile($trackID);
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
            $track = $this->tracksModel->getFile($trackID);
            if ($_SESSION["user_id"]==$track->user_id){
                $trackName = $_POST["name"];
                $trackGenre = $_POST["genre"];
                $trackDate = $_POST["date"];

                $this->tracksModel->editFile($trackID, $trackName, $trackGenre, $trackDate);
                
                header("location:".$_SERVER['HTTP_REFERER']);
            } else {
                header("Location:".BASE_URL);
            }
        } else {
            header("Location:".BASE_URL."login/");
        }      
    }

    public function printTracksByGenre($filter) {
        $genres = $this->genresModel->getGenres();
        $tracks = $this->tracksModel->getTracksBy($filter);
        if ($tracks) {
            $this->tracksView->showTracks($tracks, $genres);
        } else {
            $this->tracksView->showTracksErr($filter);
        }        
    }
}