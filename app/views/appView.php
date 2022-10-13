<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class appView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }

        public function showHeader($account = null) {
            if ($account!=null) {
                $this->smarty->assign('photo_dir', $account->photo_dir);
            }
            $this->smarty->display('header.tpl');
        }

        public function showFooter() {
            $this->smarty->display('footer.tpl');
        }        
    }