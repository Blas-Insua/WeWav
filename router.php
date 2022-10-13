<?php

require_once "app/controllers/authController.php";
require_once "app/controllers/accountsController.php";
require_once "app/controllers/tracksController.php";
require_once "app/controllers/genresController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action']; 
}

$params = explode('/', $action); 

require_once "app/controllers/appController.php";
$appController = new appController();
$appController->printHeader();
    
switch ($params[0]) {
    case 'signup':
        $authController = new authController();
        $authController->printSignupForm();
        break;     
    case 'login':
        $authController = new authController();
        $authController->printLoginForm();
        break;        
    case 'signupSubmit':
        $authController = new authController();
        $authController->signup();
        break;
    case 'loginSubmit':
        $authController = new authController();
        $authController->login();
        break;
    case 'logout':
        $authController = new authController();
        $authController->logout();
    case 'management':
        $appController->printSystemManagement($params[1]);      
        break;
    case 'home':
        $accountsController = new accountsController();
        $tracksController = new tracksController();

        $accountsController->printAccountsStories();
        $tracksController->printTracks();
        break;
    case 'artists':
        $accountsController = new accountsController();
        $accountsController->printAccounts();
        break;
    case 'about':
        $accountsController = new accountsController();
        $accountsController->printAbout($params[1]);
        break;
    case 'account':
        $accountsController = new accountsController();
        if ($params[2] && $params[2]=="settings") {        
            switch ($params[3]) {
                case 'general':
                    $accountsController->printProfileManager($params[1], $params[3]);
                    break;
                case 'profilePhoto':
                    if ($params[4] && $params[4]=="delete") {
                        $accountsController->deleteProfilePhoto($params[1]);
                    } else {
                        $accountsController->printProfileManager($params[1], $params[3]);
                    }
                    break;
                case 'security':
                    $accountsController->printProfileManager($params[1], $params[3]);
                    break;
                case 'delete':
                    $accountsController->printProfileManager($params[1], $params[3]);
                    break;                
                default:
                    $accountsController->printProfileManager($params[1], "general");
                    break;
            }     
        } else {            
            $accountsController->printAbout($params[1]);
        }     
        break;
    case 'editProfile':
        $accountsController = new accountsController();
        $accountsController->editProfile($params[1], $params[2]);        
        break;
    case 'deleteProfile':
        $accountsController = new accountsController();
        $accountsController->deleteProfile($params[1]);        
        break;
    case 'tracks':
        $tracksController = new tracksController();
        $tracksController->printTracks();
        break;
    case 'upload':
        $tracksController = new tracksController();
        $tracksController->printUploadSection();
        break;
    case 'uploadFile':
        $tracksController = new tracksController();
        $tracksController->uploadFile();
        break;
    case 'editFile':
        $tracksController = new tracksController();
        $tracksController->editFile($params[1]);
        break;
    case 'deleteFile':
        $tracksController = new tracksController();
        $tracksController->deleteFile($params[1]);        
        break;
    case 'genres':
        if ($params[1]) {
            $tracksController = new tracksController();
            $tracksController->printTracksByGenre($params[1]);
        } else {
            $genresController = new genresController();
            $genresController->printGenres();
        }
        break;
    case 'editGenre':
        $genresController = new genresController();
        $genresController->editGenre($params[1]);
        break;
    case 'deleteGenre':
        $genresController = new genresController();
        $genresController->deleteGenre($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
        
}

$appController->printFooter();
