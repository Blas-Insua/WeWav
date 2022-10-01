<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class tracksView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        public function showTracks($tracks) {
            $this->smarty->assign('tracks', $tracks);    
            $this->smarty->display('tracks.tpl');
        }

        public function showUploadSection() {
            $this->smarty->display('upload.tpl');
        }
    }