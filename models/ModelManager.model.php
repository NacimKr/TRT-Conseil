<?php
require "MainManager.model.php";

/* Class liés a la connexion de la BDD pour faires des requetes sur les offres d'emplois */
class ModelManager extends MainModel{

    public function getAllDataFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `emplois`");
        $req->execute();
        $emploi_datas = $req->fetchAll(PDO::FETCH_ASSOC);
        return $emploi_datas;
    }

    public function getMyEmploi($emploi){
        $req = "SELECT POSTE FROM `emplois` WHERE POSTE = :emploi";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':emploi', $emploi, PDO::PARAM_STR);
        $stmt->execute();
        $emploi_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $emploi_datas;
    }

    public function emploiIsPostuler(){
        $req = "UPDATE `emplois` SET emploi_postuler = 'true';";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $a_postuler = $stmt->fetch(PDO::FETCH_ASSOC);
        return $a_postuler;
    }

    public function candidatsAPostuler(){
        $req = "UPDATE `utilisateur` SET a_postuler = 'true';";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $a_postuler = $stmt->fetch(PDO::FETCH_ASSOC);
        return $a_postuler;
    }

    public function getEmploiNameToUtilisateursTable(){
        $req = "SELECT * FROM `utilisateur` u INNER JOIN `emplois` e ON e.emploi_postuler = u.a_postuler";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $a_postuler = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $a_postuler;
    }

    public function createNewOffresEmploi($poste, $duree, $description, $salaire, $debut, $fin){
        $req = "INSERT INTO `emplois` (POSTE, Durée, Description, Salaire, heure_debut, heure_fin) VALUES 
        (:poste, :duree, :description, :salaire, :debut, :fin);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);
        $stmt->bindValue(':duree', $duree, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':salaire', $salaire, PDO::PARAM_STR);
        $stmt->bindValue(':debut', $debut, PDO::PARAM_STR);
        $stmt->bindValue(':fin', $fin, PDO::PARAM_STR);
        $stmt->execute();
        //$emploi_datas = $stmt->rowCount() > 0;
        $emploi_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $emploi_datas;
    }

    public function getEmploiPostule(){
        $req = "SELECT * FROM utilisateur INNER JOIN emplois;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $a_postuler = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $a_postuler;
    }
}