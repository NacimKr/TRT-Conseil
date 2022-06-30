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
/**********************************************************************************************/
/**********************************************************************************************/
        if($_POST['name'] === $this->getUtilisateur->getAdminACCOUNT()['login'] &&
        $_POST['password'] === $this->getUtilisateur->getAdminACCOUNT()['mot_de_passe']){
            $loginAdmin = $this->getUtilisateur->getAdminACCOUNT()['login'];
            $passwordAdmin = $this->getUtilisateur->getAdminACCOUNT()['mot_de_passe'];
            $_SESSION['admin'] = [
                "login" => $loginAdmin,
                "password" => $passwordAdmin
            ];
            ob_start();
            require_once "./views/admin/home-admin.php";
            $page_content = ob_get_clean();
            require_once "./views/common/template.php";
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
        unset($_SESSION['admin']);
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

    public function validation_account(){
        // echo "Login : ".$_POST['login']."<br/>";
        // echo "Mail : ".$_POST['mail']."<br/>";
        // echo "Mot de passe : ".$_POST['mot_de_passe']."<br/>";
        // echo "Vous êtes : ".$_POST['role']."<br/>";
        $est_valide = 0;
        if(!empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['mot_de_passe']) && !empty($_POST['role'])){
            $createNewUser = $this->getUtilisateur->createUser($_POST['login'], password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT), $_POST['mail'], $_POST['role'], $est_valide);

            if(!$createNewUser){
                $_SESSION['alert'] = [
                    "class" => "alert-warning",
                    "message" => "Votre compte n'a pas été créé dans notre base"
                ];
            }else{
                $_SESSION['alert'] = [
                    "class" => "alert-success",
                    "message" => "Votre compte à bien été créé dans notre base <br/>
                    <p class='fs-4'>Vous allez recevoir un mail de confirmation pour valider votre compte</p>"
                ];
                ob_start();
                require_once "./views/accountCreate.view.php";
                $page_content = ob_get_clean();
                require_once "./views/common/template.php";
            }
        }else{
            $_SESSION['alert'] = [
                "class" => "alert-warning",
                "message" => "Merci de renseigner les champs"
            ];
            header('Location:http://localhost/TRT_CONSEIL/create_account');
        }
    }

    function error(){
        ob_start();
        require_once "./views/erreur.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    public function offres_emploi(){
        $emploi_datas = $this->mainModel->getAllDataFromDB();
        ob_start();
        require_once "./views/admin/offre-emploi.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    public function candidat(){
        $candidats_datas = $this->getUtilisateur->getAllCandidats();
        ob_start();
        require_once "./views/admin/candidat-admin.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }
}