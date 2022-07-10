<?php

abstract class MainModel{
    private $dataPDO;
    
    protected function getData(){
        $this->dataPDO = new PDO('mysql:oliadkuxrl9xdugh.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=adj73r9o9rrxl3t9','c4zou5oac9nqvelm','bboa90r0kdk6nd55');
        return $this->dataPDO;
    }

    public function getBDD(){
        if($this->getData() === null){
            echo "Erreur de connexion à la Base de données";
        }
        return $this->dataPDO;
    }
}