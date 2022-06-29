<?php

require_once "./models/ModelManager.model.php";
require_once "./models/GetUtilisateur.model.php";

class MainController{

    private $mainModel;
    private $getUtilisateur;

    public function __construct(){
        $this->mainModel = new ModelManager();
        $this->getUtilisateur = new GetUtilisateur();
    }

    function home(){
        ob_start();
        require_once "./views/home.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    function candidats(){
        $emploi_datas = $this->mainModel->getAllDataFromDB();
        ob_start();
        require_once "./views/candidats.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }
    
    function nos_clients(){
        ob_start();
        require_once "./views/nos_clients.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        
    }

    function contact(){
        ob_start();
        require_once "./views/contact.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    function login(){
        ob_start();
        require_once "./views/login.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    function validation_form(){

        $_SESSION['alert'] = [
            "class" => "",
            "message" => ""
        ];

        if(!empty($_POST['name']) && !empty($_POST['password'])){
            $nameSecure = htmlspecialchars($_POST['name']);
            $passwordSecure = htmlspecialchars($_POST['password']);
            //var_dump($this->getUtilisateur->isValid($nameSecure, $passwordSecure));
            $getConnexion = $this->getUtilisateur->isValid($nameSecure, $passwordSecure);
            if($getConnexion){

                $_SESSION['connecté'] = [
                    "name" => $nameSecure, 
                    "password" => $passwordSecure
                ];

                ob_start();
                require_once "./views/views.profil/profil.view.php";
                $page_content = ob_get_clean();
                require_once "./views/common/template.php";
            }
        }else{
            $_SESSION['alert'] = [
                "class" => "alert-danger",
                "message" => "Vous n'avez rien saisi, Merci de renseigner les champs ci-dessous"
            ];
            header('Location:http://localhost/TRT_CONSEIL/login');
        }
    }
    
    public function compte(){
        ob_start();
        require_once "./views/views.profil/compte.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        $datasUser = $this->getUtilisateur->getMyUser($_SESSION['connecté']['name']);
        var_dump($datasUser);
    }

    public function deconnect(){
        unset($_SESSION['connecté']);
        $_SESSION['alert'] = [
            "class" => "alert-success",
            "message" => "Vous êtes bien deconnecté"
        ];
        header('Location:http://localhost/TRT_CONSEIL/home');
    }

    public function create_account(){
        ob_start();
        require_once "./views/createAccount.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    function error(){
        ob_start();
        require_once "./views/erreur.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }
}