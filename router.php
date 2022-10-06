<?php

require_once "app/controllers/accountsController.php";
require_once "app/controllers/tracksController.php";
require_once "app/controllers/genresController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action']; 
}

$params = explode('/', $action); 

$accountsController = new accountsController();
$tracksController = new tracksController();
$genresController = new genresController();

require_once "app/controllers/appController.php";
$appController = new appController();
$appController->printHeader();
    
switch ($params[0]) {
    case 'signup':
        $accountsController->printSignupForm();
        break;     
    case 'login':
        $accountsController->printLoginForm();
        break;        
    case 'signupSubmit':
        $accountsController->signupSubmit();
        break;
    case 'loginSubmit':
        $accountsController->loginSubmit();
        break;
    case 'logout':
        $accountsController->logout();
    case 'management':
        $appController->printSystemManagement($params[1]);      
        break;
    case 'home':
        $accountsController->printAccountsStories();
        $tracksController->printTracks();
        break;
    case 'artists':
        $accountsController->printAccounts();
        break;
    case 'about':
        $accountsController->printAbout($params[1]);
        break;
    case 'account':
        $accountsController->printProfileManager($params[1], null);     
        break;
    case 'accountSettings':
        $accountsController->printProfileManager($_SESSION["name"], $params[1]);     
        break;
    case 'editProfile':
        $accountsController->editProfile($params[1]);        
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
    default:
        header("location:".BASE_URL."home/");
        break;
        
}

$appController->printFooter();
