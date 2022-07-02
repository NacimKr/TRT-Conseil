<?php

require_once "./models/MainManager.model.php";

/* Class liés a la connexion de la BDD pour faires des requetes sur les utilisateurs */
class GetUtilisateur extends MainModel{
    private function getPasswordUser($name){
        $requete = "SELECT mot_de_passe from utilisateur where login = :name; ";
        $connexion = $this->getBDD()->prepare($requete);
        $connexion->bindValue(':name', $name, PDO::PARAM_STR);
        $connexion->execute();
        $resultat = $connexion->fetch(PDO::FETCH_ASSOC);
        $connexion->closeCursor();
        return $resultat['mot_de_passe'];
    }
    
    public function isValid($name, $password){
        //On recupère le mot de passe crypté
        $passwordBD = $this->getPasswordUser($name);
        return password_verify($password, $passwordBD);
    }
    
    public function getMyUser($userConnect){
        $requete = "SELECT login from utilisateur where login = :user ";
        $connexion = $this->getBDD()->prepare($requete);
        $connexion->bindValue(':user', $userConnect, PDO::PARAM_STR);
        $connexion->execute();
        $resultat = $connexion->fetch(PDO::FETCH_ASSOC);
        $connexion->closeCursor();
        return $resultat;
    }

    public function createUser($login, $password, $email, $role, $cv){
        $req = "INSERT INTO utilisateur (login, mot_de_passe, role, email, cv_file) VALUES
            (:login, :password, :role, :email, :cv);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':cv', $cv, PDO::PARAM_STR);
        $stmt->execute();
        $newUsers = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        // $initial = substr($_SERVER['SCRIPT_NAME'], 0, -9);
        // $second = str_replace($initial, "", $initial."file_cv");

        // fopen($initial.$second, 'r');

        return $newUsers;
    }

    public function getAllCandidats(){
        $requete = "SELECT * from utilisateur WHERE role != 'Administrateur' ";
        $connexion = $this->getBDD()->prepare($requete);
        $connexion->execute();
        $resultat = $connexion->fetchAll();
        //$resultat = $connexion->rowCount() > 0;
        $connexion->closeCursor();
        return $resultat;
    }
}