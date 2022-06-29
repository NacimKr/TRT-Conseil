<?php

require "./GetUtilisateur.model.php";

class UtilisateurController{
    
    private $UtilisateurController;
    
    public function __construct(){
        $this->UtilisateurController = new GetUtilisateur();
    }
}