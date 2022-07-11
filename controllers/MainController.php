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

public function home(){
    ob_start();
    require_once "./views/home.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function candidats(){
    $emploi_datas = $this->mainModel->getAllDataFromDB();
    ob_start();
    require_once "./views/candidats.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function vos_offres(){
    $emploi_datas = $this->mainModel->getAllDataFromDB();
    ob_start();
    require_once "./views/vos_offres.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function postuler(){
    echo substr($_GET['page'], 9);
    $get_emploi_by_name = substr($_GET['page'], 9);
    $get_emploi = $this->mainModel->getMyEmploi($get_emploi_by_name);

    ob_start();
    require_once "./views/postuler-offres.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
    $emploi_datas = $this->mainModel->getAllDataFromDB();

    $my_emplois = null;
    
    foreach($get_emploi as $emploi){
        $my_emplois = $emploi;
    }
    
    $my_emploi = $this->mainModel->getMyEmploi($my_emplois['POSTE']);
    $a_postuler_true = $this->getUtilisateur->aPostuler($my_emploi[0]['POSTE']);
    $emploi_from_click = $this->getUtilisateur->getPosteFromTableFusion(substr($_GET['page'], 9));

    echo "------------<br/>";
    echo $my_emploi[0]['POSTE'];
    echo "<br/>------------";

    $this->getUtilisateur->aPostuler($my_emploi[0]['POSTE']);
    $this->mainModel->candidatsAPostuler();
    //var_dump($this->mainModel->getEmploiNameToUtilisateursTable());
}

/*************************************************** */

public function login_consultant(){
    ob_start();
    require_once "./views/consultant/login-consultant.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";  
}

public function validation_form_consultant(){
    if(!empty($_POST['name_consultant']) && !empty($_POST['password_consultant'])){
        $nameConsultant = htmlentities($_POST['name_consultant']);
        $passwordConsultant = htmlentities($_POST['password_consultant']);
        $_SESSION['consultant'] = [
            "nameConsultant" => $nameConsultant,
            "passwordConsultant" => $passwordConsultant
        ];

        $this->getConsultant->isValidConsultant($nameConsultant, $passwordConsultant);
        ob_start();
        require_once "./views/consultant/home-consultant-view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";  
        var_dump($this->getConsultant->isValidConsultant($nameConsultant, $passwordConsultant));
    }
}

public function nouvelle_offre(){
    $emplois_recr = $this->mainModel->getAllDataFromDB();
    ob_start();
    require_once "./views/recruteur/nouvelle_offre.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
    if(isset($_POST['poste']) && isset($_POST['duration']) && isset($_POST['description'])){
        $annoncePublier = $this->mainModel->createNewOffresEmploi($_POST['poste'], $_POST['duration'], $_POST['description'], $_POST['salary'], $_POST['debut'], $_POST['fin']);
        header('Location:'.URL.'/offres_emploi');
        if($annoncePublier){
            $_SESSION['alert'] = [
                "class" => "alert-primary",
                "message" => "Votre annonce à bien été publié"
            ];
        }
}
}

public function candidats_postule(){
    $list_emploi = $this->mainModel->getEmploiPostule();
    ob_start();
    require_once "./views/consultant/lists_candidats_postule.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";  
}

public function nos_clients(){
    ob_start();
    require_once "./views/nos_clients.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";  
}

public function contact(){
    ob_start();
    require_once "./views/contact.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function login(){
    ob_start();
    require_once "./views/login.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function list_candidatures(){
    $list_candidatures = $this->getUtilisateur->tableFusion();
    ob_start();
    require_once "./views/recruteur/list_candidature.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function validation_form(){
    
    if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['role'])){
        $nameSecure = htmlspecialchars($_POST['name']);
        $passwordSecure = htmlspecialchars($_POST['password']);
        $getConnexion = $this->getUtilisateur->isValid($nameSecure, $passwordSecure);

        if($getConnexion){
            $_SESSION['alert'] = [
                "class" => "alert-primary",
                "message" => "Votre connexion a bien été établi"
            ];
            if($_POST['role'] === "recruteurs"){
                $_SESSION['recruteur_connecte'] = [
                    "recruteur_role" => $_POST['role'],
                    "recruteur_name" => $nameSecure
                ];
            }elseif($_POST['role'] === "candidats"){
                $_SESSION['connecté'] = [
                    "name" => $nameSecure, 
                    "password" => $passwordSecure,
                    "role" => $_POST['role']
                ];
            }elseif($_POST['role'] === "..."){
                $_SESSION['alert'] = [
                    "class" => "alert-danger",
                    "message" => "Veuillez saisir le champs <i>'Vous êtes'</i>"
                ];
                header('Location:'.URL.'login');
                die();
            }else{
                $_SESSION['alert'] = [
                    "class" => "alert-danger",
                    "message" => "Veuillez saisir les renseignements demandées"
                ];
                header('Location:'.URL.'login');
                die();
            }

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
        header('Location:'.URL.'login');
    }
}
/**********************************************************************************************/
/**********************************************************************************************/

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
    unset($_SESSION['postuler']);
    unset($_SESSION['admin']);
    unset($_SESSION['consultant']);
    unset($_SESSION['recruteur_connecte']);
    $_SESSION['alert'] = [
        "class" => "alert-success",
        "message" => "Vous êtes bien deconnecté"
    ];
    header('Location:'.URL.'home');
}

public function create_account(){
    ob_start();
    require_once "./views/createAccount.view.php";
    $page_content = ob_get_clean();
    require_once "./views/common/template.php";
}

public function validation_account(){
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

public function error(){
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
        header('Location:'.URL.'/offres_emploi');
        if($annoncePublier){
            $_SESSION['alert'] = [
                "class" => "alert-primary",
                "message" => "Votre annonce à bien été publié"
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
        $this->getConsultant->createConsultant($_POST['nom_consultant'],$_POST['prenom_consultant'],$_POST['login_consultant'], password_hash($_POST['password_consultant'], PASSWORD_DEFAULT));
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
            //var_dump($get_admin);
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