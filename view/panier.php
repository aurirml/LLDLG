<?php
session_start();
if (isset($_SESSION['con'])) {
    $nom = $_SESSION['con'];
    $servername ='localhost';
    $username= 'root';
    $password='';
    $dataBaseName='avis';
    $conn= new mysqli($servername, $username, $password, $dataBaseName);
    if($conn->connect_error){
        die("connection echou�e");
    }
    if(isset($_SESSION['offline'])){
        $montableau=$_SESSION['offline'];
        foreach ($montableau as $element) {
            $sql="INSERT INTO `commande` (`id_commande`, `nom_client`, `nom_plat`) VALUES (NULL, '$nom','$element');";
            $conn->query($sql);

        }
        unset($_SESSION['offline']);
    }



    $sql="SELECT * FROM commande WHERE nom_client='$nom';";
    $result=$conn->query($sql);
    
    while($row=$result->fetch_assoc()){
        echo $row["nom_plat"];




















        echo '<br/>';
    }
$conn->close();
}else{
    if(isset($_SESSION['offline'])){
        $montableau=$_SESSION['offline'];
        foreach ($montableau as $element) {
            echo $element . '<br>';





















        }
    }
}
?>