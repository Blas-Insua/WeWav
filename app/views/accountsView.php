<?php
    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

    class signupFormView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        function showSignupForm($countries, $genres) {  
            require_once 'templates/header.php';
            $this->smarty->assign('countries', $countries);
            $this->smarty->assign('genres', $genres);
            $this->smarty->display('signupForm.tpl');
        }
    }

    class accountsView {
        private $smarty;
    
        public function __construct() {
            $this->smarty = new Smarty();
        }
    
        function showAbout($account, $tracks) {
            require_once 'templates/header.php';
            foreach ($account as $account) {
                $this->smarty->assign('account', $account);    
                $this->smarty->assign('totalTracks', count($tracks));  
                $this->smarty->display('userCard.tpl');

                $this->smarty->assign('tracks', $tracks);  
                $this->smarty->display('tracks.tpl');
            }
        }

        function showAccounts($accounts) {
            require_once 'templates/header.php';
            foreach ($accounts as $account) {
                require_once './app/models/tracksModel.php';
                $tracksModel = new tracksModel();
                $tracks = $tracksModel->getTracksByAcc($account->name);

                $this->smarty->assign('totalTracks', count($tracks));  
                $this->smarty->assign('account', $account);    
                $this->smarty->display('userCard.tpl'); 
            }

        }
    }

    