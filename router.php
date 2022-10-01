<?php

require_once "app/controllers/accountsController.php";
require_once "app/controllers/tracksController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// leo el parametro accion
$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];  // action => about/juan
}

// parsea la accion Ej: about/juan --> ['about', 'juan']
$params = explode('/', $action); // genera un arreglo

$accountsController = new accountsController();
$tracksController = new tracksController();
    
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
        logout();
    case 'tracks':
        $tracksController->printTracks();
        break;
    case 'upload':
        $tracksController->printUploadSection();
        break;
    case 'uploadFile':
        uploadFile();
        break;
    case 'editFile':
        editFile($params[1], $params[2], $params[3], $params[4]);
        break;
    case 'deleteFile':
        deleteFile($params[1]);
        break;
    case 'artists':
        $accountsController->printAccounts();
        break;
    case 'about':
        $accountsController->About($params[1]);
        break;
}
