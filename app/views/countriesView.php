<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class countriesView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        function showCountries($countries) {
            $this->smarty->assign('countries', $countries);    
            $this->smarty->display('countries.tpl');
        }
    }
    