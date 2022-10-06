<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class adminView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        public function showSystemManagement($tracks, $genres, $accounts, $roles, $management) {  
            $this->smarty->assign('session', $_SESSION);
            $this->smarty->assign('management', $management);
            $this->smarty->assign('tracks', $tracks);
            $this->smarty->assign('genres', $genres);
            $this->smarty->assign('accounts', $accounts);
            $this->smarty->assign('roles', $roles);
            $this->smarty->display('SysManagement.tpl');
        }
    }