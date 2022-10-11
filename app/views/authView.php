<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class authView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();            
        }
        
        public function showSignupForm($captcha, $error = null) {  
            require_once './app/controllers/appController.php';
            $appController = new appController();  
            $captcha = $appController->printCaptcha();

            require_once './app/models/countriesModel.php';
            $countriesModel = new countriesModel();
            $countries = $countriesModel->getCountries();

            require_once './app/models/genresModel.php';
            $genresModel = new genresModel();
            $genres = $genresModel->getGenres();

            $this->smarty->assign('error', $error);
            $this->smarty->assign('captcha', $captcha);
            $this->smarty->assign('countries', $countries);
            $this->smarty->assign('genres', $genres);
            $this->smarty->display('signupForm.tpl');
        }

        public function showLoginForm($captcha, $error = null) {

            $this->smarty->assign('error', $error);
            $this->smarty->assign('captcha', $captcha);
            $this->smarty->display('loginForm.tpl');
        }
    }