<?php

class Notation{
    private $nom;    
    private $note;
    private $com;
    private $nom_plat;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
      }

    function afficheNote(){
        return $this->nom . '/ ' . $this->note . '/ ' . $this->com;
    }
}
?>