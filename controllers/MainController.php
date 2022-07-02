<?php
require_once "./models/ModelManager.model.php";
require_once "./models/GetUtilisateur.model.php";
require_once "./models/GetConsultant.model.php";
require_once "./models/GetAdmin.model.php";

class MainController{

    private $mainModel;
    private $getUtilisateur;
    private $getConsultant;
    private $getAdministrator;

    public function __construct(){
        $this->mainModel = new ModelManager();
        $this->getUtilisateur = new GetUtilisateur();
        $this->getConsultant = new GetConsultant();
        $this->getAdministrator = new GetAdmin();
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
            }elseif($getConnexion == false){
                ob_start();
                require_once "./views/no-profil-found.view.php";
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
        
        // if($_POST['name'] === $this->getUtilisateur->getAdminACCOUNT()['login'] &&
        // $_POST['password'] === $this->getUtilisateur->getAdminACCOUNT()['mot_de_passe']){
        //     $loginAdmin = $this->getUtilisateur->getAdminACCOUNT()['login'];
        //     $passwordAdmin = $this->getUtilisateur->getAdminACCOUNT()['mot_de_passe'];
        //     ob_start();
        //     require_once "./views/admin/home-admin.php";
        //     $page_content = ob_get_clean();
        //     require_once "./views/common/template.php";
            
        //     $_SESSION['admin'] = [
        //         "login" => $loginAdmin,
        //         "password" => $passwordAdmin
        //     ];
        // }
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
        if(!empty($_POST['login']) && !empty($_POST['mail']) && !empty($_POST['mot_de_passe']) && !empty($_POST['role'])){
            $createNewUser = $this->getUtilisateur->createUser($_POST['login'], password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT), $_POST['mail'], $_POST['role'], $_POST['cv']);
            ob_start();
            require_once "./views/accountCreate.view.php";
            $page_content = ob_get_clean();
            require_once "./views/common/template.php";

            if($createNewUser){
                $_SESSION['alert'] = [
                    "class" => "alert-warning",
                    "message" => "Votre compte n'a pas été créé dans notre base"
                ];
            }else{
                $_SESSION['alert'] = [
                    "class" => "alert-success",
                    "message" => "Votre compte à bien été créé dans notre base <br/>"
                ];
            }
        }else{
            $_SESSION['alert'] = [
                "class" => "alert-warning",
                "message" => "Merci de renseigner les champs"
            ];
        }
    }

    function error(){
        ob_start();
        require_once "./views/erreur.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }
    
    public function offres_emploi(){
        ob_start();
        $emplois = $this->mainModel->getAllDataFromDB();
        require_once "./views/admin/offre-emploi.php";
        $page_content = ob_get_clean();
        $this->publierAnnonce($emplois);
        require_once "./views/common/template.php";
        //$this->publierAnnonce($emploi_datas);
    }
///*////////
    public function candidat(){
        $candidats_datas = $this->getUtilisateur->getAllCandidats();
        ob_start();
        require_once "./views/admin/candidat-admin.php";
        $page_content = ob_get_clean();
        //$candidats = $this->getUtilisateur->getAllCandidats();
        require_once "./views/common/template.php";
    }
////////////
    public function create_emploi(){
        ob_start();
        require_once "./views/admin/form-create-emploi-admin.php";
        $emploi_datas = $this->mainModel->getAllDataFromDB();
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        if(isset($_POST['poste']) && isset($_POST['duration']) && isset($_POST['description'])){
            $annoncePublier = $this->mainModel->createNewOffresEmploi($_POST['poste'], $_POST['duration'], $_POST['description'], $_POST['salary'], $_POST['debut'], $_POST['fin']);
            header('Location:http://localhost/TRT_CONSEIL/offres_emploi');
            if($annoncePublier){
                $_SESSION['alert'] = [
                    "class" => "alert-primary",
                    "message" => "Votre annone à bien été publié"
                ];
            }
        }
    }

    public function publierAnnonce($emploi){
        return $emploi;
    }

    public function publierLesCandidats($candidats){
        return $candidats;
    }

    public function create_consultant(){
        ob_start();
        require_once "./views/admin/consultant-admin.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";

        if(isset($_POST['prenom_consultant']) && isset($_POST['nom_consultant']) && isset($_POST['login_consultant']) && isset($_POST['password_consultant'])){
            $this->getConsultant->createConsultant($_POST['nom_consultant'],$_POST['prenom_consultant'],$_POST['login_consultant'],$_POST['password_consultant']);
        }
    }
    
    public function consultant(){
        $consultants_datas = $this->getConsultant->getAllConsultant();
        ob_start();
        require_once "./views/admin/list-consultant-admin.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    public function admin(){
        ob_start();
        require_once "./views/login-admin.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }

    public function profil_admin(){

        $get_admin = $this->getAdministrator->getAdmin();
        $_SESSION['admin'] = [
            "loginAdmin" => "",
            "loginPassword" => "",
        ];

        if(isset($_POST['name-admin']) && isset($_POST['password-admin'])){
            if($_POST['name-admin'] === $get_admin['login'] && $_POST['password-admin'] === $get_admin['password']){
                ob_start();
                require_once "./views/admin/home-admin.php";
                $page_content = ob_get_clean();
                require_once "./views/common/template.php";
                var_dump($get_admin);
            }else{
                unset($_SESSION['admin']);
                ob_start();
                require_once "./views/no-profil-found.view.php";
                $page_content = ob_get_clean();
                require_once "./views/common/template.php";
            }
        }
    }

}