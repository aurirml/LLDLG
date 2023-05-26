<?php
$dao = new DAO();

class DAO
{
    private $db;

    function __construct()
    {
        try {
            $username = 'root';
            $password = '';
            $dataBaseName = 'avis';
            $servername = 'localhost';

            $this->db = new PDO('mysql:host=' . $servername . ';dbname=' . $dataBaseName . ';charset=utf8', $username, $password);

            /*
$conn= new mysqli($servername, $username, $password, $dataBaseName);
if($conn->connect_error){
    die("connection echouée");
}*/
        } catch (PDOException $e) {
            exit('[ERREUR OUVERTURE PDO]' . $e->getMessage());
        }
    }

    function connection($username, $password):bool{//renvoie TRUE si le couple login/mdp(mot de passe) est valide sinon FALSE
        $select = $this->db->prepare('SELECT * FROM client WHERE nom = :nom AND mdp = :mdp;');
        $select->bindParam(':nom', $username);
        $select->bindParam(':mdp', $password);
  
        $select->execute();
  
        $result = $select->fetchAll();
        $select->closeCursor();
  
        return ($result != NULL);
      }  
}
