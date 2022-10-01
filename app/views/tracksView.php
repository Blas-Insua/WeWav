<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class tracksView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        function showTracks($tracks) {
            require_once 'templates/header.php';
            $this->smarty->assign('tracks', $tracks);    
            $this->smarty->display('tracks.tpl');
        }
    }