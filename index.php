<?php
session_start();
require_once "./controllers/MainController.php";
$mainController = new MainController();

if(empty($_GET['page'])){
    $_GET['page'] = "home";
}

$params = explode('/', $_GET['page']);

try{
switch($params[0]){
        case 'home':
            $mainController->home();
        break;
    
        case 'nos_clients':
            $mainController->nos_clients();
        break;
    
        case 'candidats':
            $mainController->candidats();
        break;

        case 'vos_offres':
            $mainController->vos_offres();
        break;

        case 'postuler':
            $mainController->postuler();
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

        case 'list_candidature':
            $mainController->list_candidatures();
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

        case 'validation_form_consultant':
            $mainController->validation_form_consultant();
        break;

        case 'candidats_postule':
            $mainController->candidats_postule();
        break;

        case 'login-consultant':
            $mainController->login_consultant();
        break;

        case 'admin':
            $mainController->admin();
        break;

        case 'profil_admin':
            $mainController->profil_admin();
        break;
        
        default: throw new Exception("La page existe pas !");
        break;
}
}catch(Exception $e){
    $mainController->error();
}
// //Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);