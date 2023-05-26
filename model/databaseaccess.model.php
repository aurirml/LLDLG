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
        $result['status']=false;
        if (!$this->userExists($username, $email)) {
            $insert = $this->db->prepare('INSERT INTO client(nom, email, mdp) VALUES (:nom, :email, :mdp);');

            $insert->bindParam(':nom', $username);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':mdp', $password);

            $check = $insert->execute();
            if ($check) {
                $result['status']=true;
                $insert->closeCursor();
            }
            else{
                $result['message']="Erreur lors l'inscription";
            }
        }
        else{
            $result['message']="Ce nom d'utilisateur / cet email est déjà utilisé !";
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
}
