<?php

require_once "./models/MainManager.model.php";

class GetConsultant extends MainModel {

    private function getPasswordConsultant($login){
        $requete = "SELECT mdp from consultants where login = :login; ";
        $connexion = $this->getBDD()->prepare($requete);
        $connexion->bindValue(':login', $login, PDO::PARAM_STR);
        $connexion->execute();
        $resultat = $connexion->fetch(PDO::FETCH_ASSOC);
        $connexion->closeCursor();
        return $resultat['mdp'];
    }
    
    public function isValidConsultant($name, $password){
        //On recupère le mot de passe crypté
        $passwordBD = $this->getPasswordConsultant($name);
        //return $passwordBD;
        return password_verify($password, $passwordBD);
    }

    public function createConsultant($nom, $prenom, $login, $password){
        $req = "INSERT INTO consultants (nom, prenom, login, mdp) VALUES
        (:nom, :prenom, :login, :password);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $newConsultants = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $newConsultants;
    }

    public function getAllConsultant(){
        $req = "SELECT * FROM `consultants`";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $consultants = $stmt->fetchAll();
        $stmt->closeCursor();
        return $consultants;
    }
}