<?php
require "MainManager.model.php";

/* Class liés a la connexion de la BDD pour faires des requetes sur les offres d'emplois */
class ModelManager extends MainModel{
    public function getAllDataFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `emplois`");
        $req->execute();
        $emploi_datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $emploi_datas;
    }
}