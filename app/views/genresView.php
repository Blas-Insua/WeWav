<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class genresView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        function showGenres($genres) {
            $this->smarty->assign('genres', $genres);    
            $this->smarty->display('genres.tpl');
        }
    }