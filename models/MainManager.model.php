<?php

abstract class MainModel{
    private $dataPDO;
    
    protected function getData(){
        $this->dataPDO = new PDO('mysql:host=eu-cdbr-west-03.cleardb.net;dbname=heroku_b4db8dab6c946a0','b77392b59a7748','2f3865fa');
        return $this->dataPDO;
    }

    public function getBDD(){
        if($this->getData() === null){
            echo "Erreur de connexion à la Base de données";
        }
        return $this->dataPDO;
    }
}