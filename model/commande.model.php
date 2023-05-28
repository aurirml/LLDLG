<?php 
class Commande{

    private $nom_client;
    private $nom_plat;
    private $taille;
    private $quantite;

    function __set($name, $value) {
        $this->$name = $value;
      }
      
    function __get($name) {
        return $this->$name;
      }


}
?>