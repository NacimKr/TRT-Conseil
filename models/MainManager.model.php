<?php

abstract class MainModel{
    private $dataPDO;
    
    protected function getData(){
        $this->dataPDO = new PDO('mysql:host=eu-cdbr-west-03.cleardb.net;dbname=trt-conseil','root','');
        return $this->dataPDO;
    }

    public function getBDD(){
        if($this->getData() === null){
            echo "Erreur de connexion à la Base de données";
        }
        return $this->dataPDO;
    }
}