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
}