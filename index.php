<?php
session_start();
require_once "./controllers/MainController.php";
$mainController = new MainController();

if(empty($_GET['page'])){
    $_GET['page'] = "home";
}

try{
switch($_GET['page']){
        case 'home':
            $mainController->home();
        break;
    
        case 'nos_clients':
            $mainController->nos_clients();
        break;
    
        case 'candidats':
            $mainController->candidats();
        break;
    
        case 'contact':
            $mainController->contact();
        break;

        case 'login':
            $mainController->login();
        break;

        case 'validation_form':
            $mainController->validation_form();
        break;

        case 'compte':
            $mainController->compte();
        break;

        case 'deconnect':
            $mainController->deconnect();
        break;

        case 'create_account':
            $mainController->create_account();
        break;

        case 'validation_account':
            $mainController->validation_account();
        break;

        case 'offres_emploi':
            $mainController->offres_emploi();
        break;

        case 'candidat':
            $mainController->candidat();
        break;

        case 'create_emploi':
            $mainController->create_emploi();
        break;

        case 'create_consultant':
            $mainController->create_consultant();
        break;

        case 'consultant':
            $mainController->consultant();
        break;
        
        default: throw new Exception("La page existe pas !");
        break;
}
}catch(Exception $e){
    $mainController->error();
}