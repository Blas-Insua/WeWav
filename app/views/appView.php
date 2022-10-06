<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class appView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }

        public function showHeader() {
            if ($_SESSION["rol"] != 3) {
                $this->smarty->assign('user_name', $_SESSION["name"]);
                $this->smarty->assign('user_id', $_SESSION["user_id"]);
                $this->smarty->assign('rol', $_SESSION["rol"]);
            };
            $this->smarty->assign('rol', $_SESSION["rol"]);
            $this->smarty->display('header.tpl');
        }

        public function showFooter() {
            $this->smarty->display('footer.tpl');
        }        
    }