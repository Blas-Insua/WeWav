<?php

require_once "app/controllers/appController.php";
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


$appController = new appController();
$authController = new authController();
$accountsController = new accountsController();
$tracksController = new tracksController();
$genresController = new genresController();
$appController->printHeader();
    
switch ($params[0]) {
    case 'signup':        
        $authController->printSignupForm();
        break;     
    case 'login':        
        $authController->printLoginForm();
        break;        
    case 'signupSubmit':        
        $authController->signup();
        break;
    case 'loginSubmit':        
        $authController->login();
        break;
    case 'logout':        
        $authController->logout();
    case 'management':
        $appController->printSystemManagement($params[1]);      
        break;
    case 'home':
        $accountsController->printAccountsStories();
        $tracksController->printTracks();
        break;
    case 'search':
        $appController->search($params[1]);
        break;
    case 'artists':
        $accountsController->printAccounts();
        break;
    case 'about':
        $accountsController->printAbout($params[1]);
        break;
    case 'account':
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
        $accountsController->editProfile($params[1], $params[2]);        
        break;
    case 'deleteProfile':
        $accountsController->deleteProfile($params[1]);        
        break;
    case 'tracks':
        $tracksController->printTracks();
        break;
    case 'upload':
        $tracksController->printUploadSection();
        break;
    case 'uploadFile':
        $tracksController->uploadFile();
        break;
    case 'editFile':
        $tracksController->editFile($params[1]);
        break;
    case 'deleteFile':
        $tracksController->deleteFile($params[1]);        
        break;
    case 'genres':
        if ($params[1]) {
            $tracksController->printTracksByGenre($params[1]);
        } else {
            $genresController->printGenres();
        }
        break;
    case 'editGenre':
        $genresController->editGenre($params[1]);
        break;
    case 'deleteGenre':        
        $genresController->deleteGenre($params[1]);
        break;
    default:
        echo('404 Page not found');
        break;
        
}

$appController->printFooter();
