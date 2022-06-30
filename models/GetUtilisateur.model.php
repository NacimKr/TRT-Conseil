<?php

require_once "./models/MainManager.model.php";

/* Class liés a la connexion de la BDD pour faires des requetes sur les utilisateurs */
class GetUtilisateur extends MainModel{
    private function getPasswordUser($name){
        $requete = "SELECT mot_de_passe from utilisateur where login = :name ";
        $connexion = $this->getBDD()->prepare($requete);
        $connexion->bindValue(':name', $name, PDO::PARAM_STR);
        $connexion->execute();
        $resultat = $connexion->fetch(PDO::FETCH_ASSOC);
        $connexion->closeCursor();
        return $resultat;
    }

    public function getAdminACCOUNT(){
        $req = "SELECT login, mot_de_passe FROM utilisateur WHERE login = 'AdminTRT01+'";
        $getAdmin = $this->getBDD()->prepare($req);
        $getAdmin->execute();
        $resultatAdmin = $getAdmin->fetch(PDO::FETCH_ASSOC);
        $getAdmin->closeCursor();
        return $resultatAdmin;
    }

    public function isValid($name, $password){
        //On recupère le mot de passe crypté
        $passwordBD = $this->getPasswordUser($name);
        return password_verify($password, $passwordBD['mot_de_passe']);
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

    public function createUser($login, $password, $email, $role, $est_valide){
        $req = "INSERT INTO utilisateur (login, mot_de_passe, role, email, est_valide) VALUES
            (:login, :password, :role, :email, 0);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $newUsers = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
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