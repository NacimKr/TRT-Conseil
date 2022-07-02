<?php

require_once "./models/MainManager.model.php";

class GetAdmin extends MainModel{

    public function getAdmin(){
        $req = "SELECT * FROM `administrateur`";
        $connexion = $this->getBDD()->prepare($req);
        $connexion->execute();
        $resultat = $connexion->fetch(PDO::FETCH_ASSOC);
        $connexion->closeCursor();
        return $resultat;
    }

}