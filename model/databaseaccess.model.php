<?php
$dao = new DAO();
require_once('../model/notation.model.php');
require_once('../model/commande.model.php');

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

        } catch (PDOException $e) {
            exit('[ERREUR OUVERTURE PDO]' . $e->getMessage());
        }
    }

    function connection($username, $password): bool
    { //renvoie TRUE si le couple login/mdp(mot de passe) est valide sinon FALSE
        $select = $this->db->prepare('SELECT * FROM client WHERE nom = :nom AND mdp = :mdp;');
        $select->bindParam(':nom', $username);
        $select->bindParam(':mdp', $password);

        $select->execute();

        $result = $select->fetchAll();
        $select->closeCursor();

        return ($result != NULL);
    }

    function inscription($username, $email, $password)
    { //retourne TRUE en cas de succes,  FALSE sinon
        $result = array();
        $result['status'] = false;
        if (!$this->userExists($username, $email)) {
            $insert = $this->db->prepare('INSERT INTO client(nom, email, mdp) VALUES (:nom, :email, :mdp);');

            $insert->bindParam(':nom', $username);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':mdp', $password);

            $check = $insert->execute();
            if ($check) {
                $result['status'] = true;
                $insert->closeCursor();
            } else {
                $result['message'] = "Erreur lors l'inscription";
            }
        } else {
            $result['message'] = "Ce nom d'utilisateur / cet email est déjà utilisé !";
        }
        return $result;
    }

    function userExists($username, $email)
    { //retourne TRUE si l'utilisateur existe, sinon FALSE
        $select = $this->db->prepare('SELECT * FROM client WHERE nom = :nom OR email = :email;');

        $select->bindParam(':nom', $username);
        $select->bindParam(':email', $email);

        $select->execute();
        $user = $select->fetchAll();

        $select->closeCursor();
        return ($user != NULL);
    }

    function calculAverage($plat)
    {
        $moyenne = $this->db->prepare('SELECT AVG(note) AS moyenne FROM projet WHERE nom_plat= :plat;');

        $moyenne->bindParam(':plat', $plat);

        $moyenne->execute();
        $average = $moyenne->fetch();

        if($average['moyenne'] != NULL){
        return number_format($average['moyenne'], 1);
        }
        else{
            return "Non noté";
        }
    }

    function getNotations($plat)
    {
        $notes = $this->db->prepare('SELECT * FROM projet WHERE nom_plat = :plat;');

        $notes->bindParam(':plat', $plat);

        $notes->execute();
        $avis = $notes->fetchAll(PDO::FETCH_CLASS, 'Notation');

        return $avis;
    }

    function insertNotation($notation){
        $insert = $this->db->prepare('INSERT INTO projet (nom, note, com, nom_plat) VALUES (:nom, :note, :com, :plat);');

        $insert->bindParam(':nom', $notation->nom);
        $insert->bindParam(':note', $notation->note);
        $insert->bindParam(':com', $notation->com);
        $insert->bindParam(':plat', $notation->nom_plat);

        return $insert->execute();

    }

    function insertOrder($commande){
        $insert = NULL;
        $quantite = 1;
        $order = $this->getOrder($commande->nom_client, $commande->nom_plat);

        if($order->nom_plat == NULL){
            $insert = $this->db->prepare('INSERT INTO commande (nom_client, nom_plat, taille, quantite) VALUES (:nom, :plat, :taille, :quantite);');
            $quantite = $commande->quantite;
            $insert->bindParam(':taille', $commande->taille);
        }
        else{
            $insert = $this->db->prepare('UPDATE commande SET quantite = :quantite WHERE nom_client = :nom AND nom_plat = :plat;');

            $quantite = $order->quantite + $commande->quantite;

        }
        var_dump($quantite);
        var_dump($insert);
        
        $insert->bindParam(':nom', $commande->nom_client);
        $insert->bindParam(':plat', $commande->nom_plat);
        $insert->bindParam(':quantite', $quantite);

        return $insert->execute();
    }

    function getOrders($nom){
        $get = $this->db->prepare('SELECT * FROM commande WHERE nom_client=:nom;');

        $get->bindParam(':nom', $nom);

        $get->execute();
        $orders = $get->fetchAll(PDO::FETCH_CLASS, 'Commande');

        return $orders;
    }

    function getOrder($nom, $plat){
        $get = $this->db->prepare('SELECT * FROM commande WHERE nom_client=:nom AND nom_plat=:plat;');

        $get->bindParam(':nom', $nom);
        $get->bindParam(':plat', $plat);

        $get->execute();
        $get->setFetchMode(PDO::FETCH_CLASS, 'Commande');
        $order = $get->fetch();

        return $order;
    }

    function deleteOrder(){

    }
}
