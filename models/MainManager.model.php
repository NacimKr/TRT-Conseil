<?php

abstract class MainModel{
    private $dataPDO;
    
    protected function getData(){
        $this->dataPDO = new PDO('mysql:host=localhost;dbname=trt-conseil','b8ad0d1d0ab786','59cb4cb7');
        return $this->dataPDO;
    }

    public function getBDD(){
        if($this->getData() === null){
            echo "Erreur de connexion à la Base de données";
        }
        return $this->dataPDO;
    }
}