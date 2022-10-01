<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class accountsView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        function showAbout($account, $tracks) {
            $this->smarty->assign('accounts', $account); 
            $this->smarty->assign('tracks', $tracks);    
            $this->smarty->display('about.tpl');
        }

        function showAccounts($accounts) { 
            $this->smarty->assign('accounts', $accounts);    
            $this->smarty->display('accounts.tpl'); 
        }

        function showSignupForm($countries, $genres) {  
            require_once 'templates/header.tpl';
            $this->smarty->assign('countries', $countries);
            $this->smarty->assign('genres', $genres);
            $this->smarty->display('signupForm.tpl');
            require_once 'templates/footer.tpl';
        }

        function showLoginForm() {
            require_once 'templates/header.tpl';
            $this->smarty->display('loginForm.tpl');
            require_once 'templates/footer.tpl';
        }
    }

    