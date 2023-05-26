<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
$servername ='localhost';
$username= 'root';
$password='';
$dataBaseName='avis';
$conn= new mysqli($servername, $username, $password, $dataBaseName);
if($conn->connect_error){
    die("connection echou�e");
}
$sql2="SELECT nom FROM client WHERE nom='$nom' AND mdp='$mdp';";
$conn->query($sql2);
$result=$conn->query($sql2);

if(mysqli_num_rows($result)==0){
    session_start();
    $_SESSION['message'] = "Mauvais nom ou mot de passe.";
    $conn->close();
    header("Location: http://localhost/isen2023/connection.php");
    exit;
}else{
    echo "connection réussite ";
    session_start();
    $_SESSION['con'] = $nom;
    header("Location: http://localhost/isen2023/Carte.php");
}
$conn->close();
}
?>