<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class accountsView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();            
        }
    
        public function showAbout($account, $tracks, $genres) {            
            $this->smarty->assign('session', $_SESSION); 
            $this->smarty->assign('genres', $genres); 
            $this->smarty->assign('account', $account); 
            $this->smarty->assign('tracks', $tracks);    
            $this->smarty->display('about.tpl');
        }

        public function showProfileManager($profile, $countries, $genres, $setting) {
            require_once './app/controllers/appController.php';
            $appController = new appController();  
            $captcha = $appController->printCaptcha();

            $this->smarty->assign('profile', $profile);
            $this->smarty->assign('setting', $setting);                
            $this->smarty->assign('countries', $countries);
            $this->smarty->assign('genres', $genres);
            $this->smarty->assign('captcha', $captcha);                        
            $this->smarty->display('profileManager.tpl');
        }

        public function showAccounts($accounts) { 
            $this->smarty->assign('accounts', $accounts);    
            $this->smarty->display('accounts.tpl'); 
        }

        public function showAccountsStories($accounts) { 
            $this->smarty->assign('accounts', $accounts);    
            $this->smarty->display('accountsStories.tpl'); 
        }        

        public function showSignupForm($countries, $genres) {  
            require_once './app/controllers/appController.php';
            $appController = new appController();  
            $captcha = $appController->printCaptcha();

            $this->smarty->assign('captcha', $captcha);
            $this->smarty->assign('countries', $countries);
            $this->smarty->assign('genres', $genres);
            $this->smarty->display('signupForm.tpl');
        }

        public function showLoginForm() {
            require_once './app/controllers/appController.php';
            $appController = new appController();  
            $captcha = $appController->printCaptcha();

            $this->smarty->assign('captcha', $captcha);
            $this->smarty->display('loginForm.tpl');
        }
    }

    