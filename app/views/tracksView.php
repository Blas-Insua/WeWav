<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class tracksView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        public function showTracks($tracks) {
            if ($_SESSION["rol"] != 3) {
                $this->smarty->assign('session', $_SESSION); 
            } else {
                $this->smarty->assign('session', null); 
            }
            require_once './app/models/genresModel.php';
            $genresModel = new genresModel();
            $genres = $genresModel->getGenres();

            $this->smarty->assign('genres', $genres);  
            $this->smarty->assign('tracks', $tracks);    
            $this->smarty->display('tracks.tpl');
        }

        public function showTracksErr($genre) {   
            $this->smarty->assign('genre', $genre);    
            $this->smarty->display('tracksErr.tpl');
        }

        public function showUploadSection($genres) {
            $this->smarty->assign('genres', $genres);  
            $this->smarty->display('upload.tpl');
        }

        
    }